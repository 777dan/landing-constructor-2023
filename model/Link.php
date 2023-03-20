<?php

class Link extends Block
{
    protected $name, $href, $color, $text_color;

    public function getName()
    {
        return $this->name;
    }
    public function __construct($name, $href, $color, $text_color)
    {
        $this->name = $name;
        $this->href = $href;
        $this->color = $color;
        $this->text_color = $text_color;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Links"-------------------------->
    <div style="margin-left:20px;margin-right:20px;text-align:center;">
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </div>
    <!-------------Кoнец блокa "Links"-------------------->\n
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
        <a class="btn" style="color:{$this->text_color};background:{$this->color};" href="{$this->href}">{$this->name}</a>
EOD;
        return $str;
    }
    public function checkType()
    {
        return "Link";
    }
}
