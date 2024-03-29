<?php

class Text extends Block
{
    private $text, $align, $background_color, $color, $textType, $id_name;

    public function __construct($text, $align, $background_color, $color, $textType, $id_name)
    {
        $this->text = $text;
        $this->align = $align;
        $this->background_color = $background_color;
        $this->color = $color;
        $this->textType = $textType;
        $this->id_name = $id_name;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Texts"-------------------------->
     <div id="main" style="text-align:{$this->align};margin-left:20px;margin-right:20px;">
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </div>
    <!-------------Кoнец блокa "Texts"-------------------->\n
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
    <{$this->textType} {$this->id_name} style='background:{$this->background_color};color:{$this->color};padding:20px;'>
       {$this->text}
    </{$this->textType}>
EOD;
        return $str;
    }

    public function checkType()
    {
        return "Text";
    }
}
