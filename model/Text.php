<?php

class Text extends Block
{
    private $text;
    private $align, $background_color, $color;

    public function __construct($text, $align, $background_color, $color)
    {
        $this->text = $text;
        $this->align = $align;
        $this->background_color = $background_color;
        $this->color = $color;
    }
    public function draw()
    {
        $str = <<<EOD
     <!-------------Блок "Text"-------------------------->
    <p class='text' style='text-align:{$this->align};background:{$this->background_color};color:{$this->color};'>
       {$this->text}
    </p>
    <!-------------Кoнец блокa "Text"-------------------->\n
EOD;
        return $str;
    }

    public function checkType()
    {
        return "Test";
    }
}
