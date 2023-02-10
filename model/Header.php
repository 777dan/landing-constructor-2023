<?php

class Header extends Block
{

    private $landing_header;

    public function __construct($landing_header = "Header")
    {
        $this->landing_header = $landing_header;
    }

    public function draw()
    {
        $str = <<<EOD
    <!-------------Блок "Header"-------------------------->
    <div class='header'>
        <h1>{$this->landing_header} </h1>
        <img src='../model/images/logo.png' style='width:100px;height:100px;'>
    </div>
    <!------------- Кoнец блокa "Header"-------------------->\n
EOD;
        return $str;
    }
}