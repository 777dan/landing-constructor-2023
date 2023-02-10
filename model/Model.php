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
                $content .= $this->blocks[$i][0]->drawStart();
                for ($j = 0; $j < count($this->blocks[$i]); $j++) {
                    $nameSelect = "selectType" . ($j + 1);
                    // echo $_POST[$nameSelect];
                    $content .= $this->blocks[$i][$j]->drawInput($_POST[$nameSelect]);
                }
                $content .= $this->blocks[$i][0]->drawEnd();
            } else {
                $content .= $this->blocks[$i]->draw();
            }
        }
        return $template = <<<EOD
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{$this->name}</title>
    </head>
    <body style='background:{$_POST['color']};'>
        {$content}
    </body>
</html>
EOD;
    }
}
