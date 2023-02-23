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
    <!-------------Кoнец блокa "Slider"-------------------->\n
    <script src="../carousel/carousel.js"></script>
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
        <a class='carousel-item'><img class='slider_images' style='width:none;' src='{$this->path}'></a>
EOD;
        return $str;
    }

    public function checkType()
    {
        return "Slider";
    }
}
