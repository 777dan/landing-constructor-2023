<?php

class Footer extends Block
{

    private $landing_footer;
    private $align, $background_color, $color;

    public function __construct($landing_footer = "Footer", $align, $background_color, $color)
    {
        $this->landing_footer = $landing_footer;
        $this->align = $align;
        $this->background_color = $background_color;
        $this->color = $color;
    }

    public function draw()
    {
        $str = <<<EOD
    <!-------------Блок "Footer"-------------------------->
    <div class='footer' style="padding:20px;background:{$this->background_color};">
        <h1 style='text-align:{$this->align};color:{$this->color};'>{$this->landing_footer} </h1>
    </div>
    <!------------- Кoнец блокa "Footer"-------------------->\n
EOD;
        return $str;
    }

    public function checkType()
    {
        return "Footer";
    }
}
