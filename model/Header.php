<?php

class Header extends Block
{

    private $landing_header;
    private $align, $background_color, $color;

    public function __construct($landing_header = "Header", $align, $background_color, $color)
    {
        $this->landing_header = $landing_header;
        $this->align = $align;
        $this->background_color = $background_color;
        $this->color = $color;
    }

    public function draw()
    {
        $str = <<<EOD
    <!-------------Блок "Header"-------------------------->
    <div class='header'>
        <h1 style='margin:0;text-align:{$this->align};background:{$this->background_color};color:{$this->color};'>{$this->landing_header} </h1>
    EOD;
        return $str;
    }
    public function drawHeaderImg()
    {
        $str = <<<EOD
        <img src='./images/logo/logo.png' style='width:100px;height:100px;'>
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
    public function checkType()
    {
        return "Header";
    }
}
