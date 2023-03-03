<?php

class Header extends Block
{

    private $landing_header;
    private $align, $b_color;

    public function __construct($landing_header = "Header", $align, $b_color)
    {
        $this->landing_header = $landing_header;
        $this->align = $align;
        $this->b_color = $b_color;
    }

    public function draw()
    {
        $str = <<<EOD
        <h1 style='margin:0;text-align:{$this->align};background-color:{$this->b_color}'>{$this->landing_header} </h1>
    EOD;
        return $str;
    }
    public function drawStart()
    {
        $str = <<<EOD
    <!-------------Блок "Header"-------------------------->
    <div class='header'>
EOD;
        return $str;
    }
    public function drawEnd()
    {
        $str = <<<EOD
    </div>
    <!------------- Кoнец блокa "Header"-------------------->\n
EOD;
        return $str;
    }

    public function drawParallax()
    {
        $str = <<<EOD
        <div class="parallax-container">
            <div class="parallax"><img src="./images/b_image/b_image.png"></div>
        </div>
        <script src="parallax.js"></script>
    EOD;
        return $str;
    }
    public function checkType()
    {
        return "Header";
    }
}
