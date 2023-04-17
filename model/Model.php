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
                if ($this->blocks[$i][0]->checkType() == "Text") {
                    $content .= $this->blocks[$i][0]->drawStart();
                    for ($j = 0; $j < $_COOKIE['numberOftexts']; $j++) {
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
                if ($this->blocks[$i][0]->checkType() == "Navbar") {
                    $content .= $this->blocks[$i][0]->drawStart();
                    for ($j = 0; $j < $_COOKIE['numberOfnavElems']; $j++) {
                        $content .= $this->blocks[$i][$j]->draw();
                    }
                    $content .= $this->blocks[$i][0]->drawMiddle();
                    for ($j = 0; $j < $_COOKIE['numberOfnavElems']; $j++) {
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
                if ($this->blocks[$i]->checkType() == "Header") {
                    if (is_dir('../landing/images/b_image')) {
                        $content .= $this->blocks[$i]->drawParallaxStart();
                        $content .= $this->blocks[$i]->drawParallax();
                    } else {
                        $content .= $this->blocks[$i]->drawStandartStart();
                    }
                    $content .= $this->blocks[$i]->draw();
                    $content .= $this->blocks[$i]->drawEnd();
                } else {
                    $content .= $this->blocks[$i]->draw();
                }
            }
        }
        return $template = <<<EOD
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{$this->name}</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body style='background:{$_POST['color']};'>
        {$content}
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="./materialize.js"></script>
    <script src="./navbar.js"></script>
    </body>
</html>
EOD;
    }
}
