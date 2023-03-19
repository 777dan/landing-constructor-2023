<?php

class CTA extends Block
{
    protected $name, $href, $align, $color, $text_color;
    public function __construct($name, $href, $align, $color, $text_color)
    {
        $this->name = $name;
        $this->href = $href;
        $this->align = $align;
        $this->color = $color;
        $this->text_color = $text_color;
    }
    public function draw()
    {
        $str = <<<EOD
     <!-------------Блок "CTA"-------------------------->
     <a class="btn" style='{$this->align}display:block;margin-top:20px;margin-bottom:20px;background:{$this->color};color:{$this->text_color};width:300px;' href="{$this->href}">{$this->name}</a>
    <!-------------Кoнец блокa "CTA"-------------------->\n
EOD;
        return $str;
    }
    public function checkType()
    {
        return "CTA";
    }
}
