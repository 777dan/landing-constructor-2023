<?php

class Header extends Block
{

    private $landing_header;
    private $align;

    public function __construct($landing_header = "Header", $align)
    {
        $this->landing_header = $landing_header;
        $this->align = $align;
    }

    public function draw()
    {
        $str = <<<EOD
    <!-------------Блок "Header"-------------------------->
    <div class='header'>
        <h1 style='text-align:{$this->align};'>{$this->landing_header} </h1>
        <img src='../images/logo.png' style='width:100px;height:100px;'>
    </div>
    <!------------- Кoнец блокa "Header"-------------------->\n
EOD;
        return $str;
    }
    public function checkType() {
        return "Header";
    }
}