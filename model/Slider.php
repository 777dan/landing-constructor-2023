<?php

class Slider extends Block
{
    public $path;

    public function __construct($path)
    {
        $this->path = $path;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Slider"-------------------------->
     <div class="carousel">
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </div>
    <script src="./carousel.js"></script>
    <!-------------Кoнец блокa "Slider"-------------------->\n
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
        <a class='carousel-item' style='width:300px;'><img class='slider_images' src='{$this->path}'></a>
EOD;
        return $str;
    }

    public function checkType()
    {
        return "Slider";
    }
}
