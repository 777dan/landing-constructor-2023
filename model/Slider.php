<?php

class Slider extends Block
{
    public $path;
    public $id_name;

    public function __construct($path, $id_name)
    {
        $this->path = $path;
        $this->id_name = $id_name;
    }

    public function drawStart()
    {
        return "
        <!-------------Блок 'Slider'-------------------------->
        <div {$this->id_name} class='carousel'>
        ";
    }

    public function drawEnd()
    {
        return "
        </div>
        <script src='./carousel.js'></script>
        <!-------------Кoнец блокa 'Slider'-------------------->\n
        ";
    }

    public function draw()
    {
        return "
        <a class='carousel-item' style='width:300px;'>
            <img class='slider_images' src='{$this->path}'>
        </a>
        ";
    }

    public function checkType()
    {
        return 'Slider';
    }
}

