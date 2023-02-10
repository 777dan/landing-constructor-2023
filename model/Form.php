<?php

class Form extends Block
{
    private $inputs = array();

    public function getName()
    {
        return $this->inputs;
    }
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Form"-------------------------->
    <form>
EOD;
        return $str;
    }
    public function drawInput($type)
    {
        $str = <<<EOD
    <input type="{$type}" value='{$this->inputs}'/>
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </form>
    <!-------------Кoнец блокa "Form"-------------------->\n
EOD;
        return $str;
    }
    public function draw()
    {
        $str = <<<EOD
    <input type="text" value='{$this->inputs}'/>
EOD;
        return $str;
    }
}
