<?php

class Form extends Block
{
    protected $inputs = array(), $type, $name;
    public function __construct($inputs, $type, $name)
    {
        $this->inputs = $inputs;
        $this->type = $type;
        $this->name = $name;
    }
    public function drawStart()
    {
        $str = <<<EOD
     <!-------------Блок "Form"-------------------------->
    <form action="action.php" method="post">
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
    <input type="{$this->type}" name="{$this->name}" value='{$this->inputs}' style="height:auto; width:auto; border: 1px solid black;"/>
EOD;
        return $str;
    }
    public function checkType()
    {
        return "Form";
    }
}
