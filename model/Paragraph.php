<?php

class Paragraph extends Block
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
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Paragraphs"-------------------------->
     <div id="main">
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </div>
    <!-------------Кoнец блокa "Paragraphs"-------------------->\n
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
    <p style='text-align:{$this->align};background:{$this->background_color};color:{$this->color};'>
       {$this->text}
    </p>
EOD;
        return $str;
    }

    public function checkType()
    {
        return "Paragraph";
    }
}
