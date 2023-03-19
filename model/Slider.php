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
     <div class="carousel" style="margin:20px;">
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
        <a class='carousel-item'><img class='slider_images' style='width:300px;' src='{$this->path}'></a>
EOD;
        return $str;
    }

    public function checkType()
    {
        return "Slider";
    }
}
