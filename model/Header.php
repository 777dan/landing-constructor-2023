<?php

class Header extends Block
{

    private $landing_header;
    private $align, $color;

    public function __construct($landing_header = "Header", $align, $color)
    {
        $this->landing_header = $landing_header;
        $this->align = $align;
        $this->color = $color;
    }

    public function draw()
    {
        $str = <<<EOD
    <!-------------Блок "Header"-------------------------->
    <div class='header'>
        <h1 style='margin:0;text-align:{$this->align};color:{$this->color};'>{$this->landing_header} </h1>
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
