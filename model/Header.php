<?php

class Header extends Block
{

    private $landing_header;
    private $align, $b_color, $text_color;

    public function __construct($landing_header = "Header", $align, $b_color, $text_color)
    {
        $this->landing_header = $landing_header;
        $this->align = $align;
        $this->b_color = $b_color;
        $this->text_color = $text_color;
    }

    public function draw()
    {
        $str = <<<EOD
        <h1 class="aligned-header" style="margin:0;color:{$this->text_color};">{$this->landing_header}</h1>
    EOD;
        return $str;
    }
    public function drawParallaxStart()
    {
        $str = <<<EOD
    <!-------------Блок "Header"-------------------------->
    <style>
    .header {
        position: relative;
    }

    .parallax-container {
        height: 400px;
        /* высота контейнера с параллакс-изображением */
        position: relative;
    }

    .header>h1 {
        position: absolute;
        top: 50%;
        left: {$this->align[1]};
        transform: translate(-50%, -50%);
        margin: 0;
        z-index: 1;
    }
    </style>
    <div class='header'>
EOD;
        return $str;
    }
    public function drawStandartStart()
    {
        $str = <<<EOD
        <div class='header' style="background-color:{$this->b_color};text-align:{$this->align[0]};padding:50px;">
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </div>
    <!------------- Кoнец блокa "Header"-------------------->\n
EOD;
        return $str;
    }

    public function drawParallax()
    {
        $str = <<<EOD
        <div class="parallax-container">
            <div class="parallax"><img src="./images/b_image/b_image.png"></div>
        </div>
        <script src="parallax.js"></script>
    EOD;
        return $str;
    }
    public function checkType()
    {
        return "Header";
    }
}
