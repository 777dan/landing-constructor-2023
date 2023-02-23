<?php

class Link extends Block
{
    protected $name, $href;

    public function getName()
    {
        return $this->name;
    }
    public function __construct($name, $href)
    {
        $this->name = $name;
        $this->href = $href;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Links"-------------------------->
    <form>
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </form>
    <!-------------Кoнец блокa "Links"-------------------->\n
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
        <a href="{$this->href}">{$this->name}</a>
EOD;
        return $str;
    }
    public function checkType()
    {
        return "Link";
    }
}
