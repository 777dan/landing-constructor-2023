<?php

class Footer extends Block
{

    private $landing_footer;

    public function __construct($landing_footer = "Footer")
    {
        $this->landing_footer = $landing_footer;
    }

    public function draw()
    {
        $str = <<<EOD
    <!-------------Блок "Footer"-------------------------->
    <div class='footer'>
        <h1>{$this->landing_footer} </h1>
    </div>
    <!------------- Кoнец блокa "Footer"-------------------->\n
EOD;
        return $str;
    }

    public function checkType() {
        return "Footer";
    }
}