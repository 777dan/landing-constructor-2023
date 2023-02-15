<?php

class Text extends Block
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
    public function draw()
    {
        $str = <<<EOD
     <!-------------Блок "Text"-------------------------->
    <div class='text'>
       {$this->text}
    </div>
    <!-------------Кoнец блокa "Text"-------------------->\n
EOD;
        return $str;
    }

    public function checkType() {
        return "Test";
    }
}