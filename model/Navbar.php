<?php

class Navbar extends Block
{
    protected $logo_name, $elem_name, $elem_href, $text_color, $background;
    public function __construct($logo_name, $elem_name, $elem_href, $text_color,$background)
    {
        $this->logo_name = $logo_name;
        $this->elem_name = $elem_name;
        $this->elem_href = $elem_href;
        $this->text_color = $text_color;
        $this->background = $background;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Navbar"-------------------------->
     <nav style="padding-left:20%;padding-right:20%;background:{$this->background};">
     <div class="nav-wrapper">
         <a href="index.html" class="brand-logo">{$this->logo_name}</a>
         <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
EOD;
        return $str;
    }
    public function drawMiddle()
    {
        $str = <<<EOD
        </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
        </ul>
        <script src="./navbar.js"></script>
    <!-------------Кoнец блокa "Navbar"-------------------->\n
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
        <li><a style="color:{$this->text_color};" href="{$this->elem_href}">{$this->elem_name}</a></li>
EOD;
        return $str;
    }
    public function checkType()
    {
        return "Navbar";
    }
}
