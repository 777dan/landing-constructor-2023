<?php

class Form extends Block
{
    private $inputs = array();
    private $type;

    public function getName()
    {
        return $this->inputs;
    }
    public function __construct($inputs, $type)
    {
        $this->inputs = $inputs;
        $this->type = $type;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Form"-------------------------->
    <form>
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
    <input type="{$this->type}" value='{$this->inputs}'/>
EOD;
        return $str;
    }
}
