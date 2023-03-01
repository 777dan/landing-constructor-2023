<?php

class Model
{

    private $name;
    private $blocks = array();

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBlocks()
    {
        return $this->blocks;
    }

    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;
    }

    public function __construct($blocks = array(), $name = "Landing-page constructor")
    {
        $this->name = $name;
        $this->blocks = $blocks;
    }

    public function generate()
    {
        $content = "";
        for ($i = 0; $i < count($this->blocks); $i++) {
            if (gettype($this->blocks[$i]) == "array") {
                if ($this->blocks[$i][0]->checkType() == "Paragraph") {
                    $content .= $this->blocks[$i][0]->drawStart();
                    for ($j = 0; $j < $_COOKIE['numberOfparagraphs']; $j++) {
                        $content .= $this->blocks[$i][$j]->draw();
                    }
                    $content .= $this->blocks[$i][0]->drawEnd();
                }
                if ($this->blocks[$i][0]->checkType() == "Form") {
                    $content .= $this->blocks[$i][0]->drawStart();
                    for ($j = 0; $j < $_COOKIE['numberOfinputs']; $j++) {
                        $content .= $this->blocks[$i][$j]->draw();
                    }
                    $content .= $this->blocks[$i][0]->drawEnd();
                }
                if ($this->blocks[$i][0]->checkType() == "Link") {
                    $content .= $this->blocks[$i][0]->drawStart();
                    for ($j = 0; $j < $_COOKIE['numberOflinks']; $j++) {
                        $content .= $this->blocks[$i][$j]->draw();
                    }
                    $content .= $this->blocks[$i][0]->drawEnd();
                }
                if ($this->blocks[$i][0]->checkType() == "Slider") {
                    $content .= $this->blocks[$i][0]->drawStart();
                    for ($j = 0; $j < $_COOKIE['numberOfsliderElements']; $j++) {
                        $content .= $this->blocks[$i][$j]->draw();
                    }
                    $content .= $this->blocks[$i][0]->drawEnd();
                }
            } else {
                $content .= $this->blocks[$i]->draw();
                if ($this->blocks[$i]->checkType() == "Header") {
                    if (file_exists('../landing/images/logo/logo.png')) $content .= $this->blocks[$i]->drawHeaderImg();
                    $content .= $this->blocks[$i]->drawEnd();
                }
            }
        }
        return $template = <<<EOD
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{$this->name}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </head>
    <style>
    html,
    body {
      height: 100%;
      margin: 0;
    } 
    </style>
    <body style='background:{$_POST['color']};'>
        {$content}
    </body>
</html>
EOD;
    }
}
