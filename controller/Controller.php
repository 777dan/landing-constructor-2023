<?php
require "../autoload.php";
class Controller
{
    private $dir;

    public function __construct($dir)
    {
        $this->dir = $dir;

        if (!is_dir($this->dir)) {
            mkdir($this->dir); // создание каталога landing
        }
    }

    public function action()
    {
        $blocks = array();
        ob_start();
        /* создание блоков */
        $styles = "html,body{height: 100%;margin: 0;}";
        if ($_POST['header']) {
            $styles .= ".header{height: 200px;";
            if ($_POST['b_Settings'] === "b_image") $styles .= "background: url('./images/b_image/b_image.png') no-repeat;background-size: 100% 200px;";
            if ($_POST['b_Settings'] === "b_color") $styles .= "background-color: {$_POST['b_color']};";
            $styles .= "}";
            $header = new Header($_POST['header'], $_POST["alignHeader"], $_POST['b_Settings'], $_POST["header_color"]);
            $blocks[] = $header;
        }

        $imagesDir = "{$this->dir}/images";
        $b_imageDir = '../landing/images/b_image';
        $sliderDir = '../landing/images/slider';
        if (is_dir($imagesDir)) {
            if (is_dir($b_imageDir)) {
                if (file_exists("$b_imageDir/b_image.png")) {
                    unlink("b_imageoDir/b_image.png");
                    rmdir($b_imageDir);
                }
            }
            if (is_dir($sliderDir)) {
                if (is_dir($sliderDir)) {
                    foreach (glob($sliderDir . '/*') as $file) {
                        unlink($file);
                    }
                    rmdir($sliderDir);
                }
            }
            rmdir($imagesDir);
        }
        $pathOfCarouselJS = "{$this->dir}/carousel.js";
        if (file_exists($pathOfCarouselJS)) {
            unlink($pathOfCarouselJS);
        }


        if ($_FILES['b_image']['name'] != "" || isset($_COOKIE['numberOfsliderElements'])) {
            mkdir($imagesDir);
            if ($_FILES['b_image']['name'] != "") {
                mkdir($b_imageDir);
            }
            if (isset($_COOKIE['numberOfsliderElements'])) {
                mkdir($sliderDir);
            }
        }

        $b_image = $_FILES['b_image'];
        $tmp_b_image = $b_image['tmp_name'];
        move_uploaded_file($tmp_b_image, "../landing/images/b_image/b_image.png");

        if (isset($_COOKIE['numberOfparagraphs'])) {
            for ($i = 1; $i <= $_COOKIE['numberOfparagraphs']; $i++) {
                if ($_POST["paragraph$i"]) {
                    $paragraphs[] = new Paragraph($_POST["paragraph$i"], $_POST["alignText$i"], $_POST["paragraph_background$i"], $_POST["paragraph_color$i"]);
                }
            }
            $blocks[] = $paragraphs;
        }

        if (isset($_COOKIE['numberOfinputs'])) {
            $true_or_false = false;
            for ($i = 0; $i < $_COOKIE['numberOfinputs']; $i++) {
                if ($_POST["inputName" . $i + 1]) {
                    $inputTypes = "inputTypes" . ($i + 1);
                    $type = "";
                    $name = "";
                    if (preg_match("#submit\d*#", $_POST[$inputTypes])) $type = "submit";
                    if (preg_match("#text\d*#", $_POST[$inputTypes])) $type = "text";
                    $name = $type . $i + 1;
                    $form[] = new Form($_POST["inputName" . $i + 1], $type, $name);
                }
                $true_or_false = true;
            }
            if ($true_or_false == true) $blocks[] = $form;
        }

        if (isset($_COOKIE['numberOflinks'])) {
            for ($i = 0; $i < $_COOKIE['numberOflinks']; $i++) {
                if ($_POST["linkName" . $i + 1]) {
                    $links[] = new Link($_POST["linkName" . $i + 1], $_POST["linkHref" . ($i + 1)]);
                }
            }
            $blocks[] = $links;
        }

        if (isset($_COOKIE['numberOfsliderElements'])) {
            for ($i = 0; $i < $_COOKIE['numberOfsliderElements']; $i++) {
                $sliderElement = $_FILES['sliderElement' . $i + 1];
                $tmp_sliderElement = $sliderElement['tmp_name'];
                move_uploaded_file($tmp_sliderElement, $sliderDir . "/slider-element" . $i + 1 . ".png");
            }

            $count = 0;
            $sliderElements = array();
            if (is_dir($sliderDir)) {
                if ($dh = opendir($sliderDir)) {
                    while (($file = readdir($dh)) !== false) {
                        if (preg_match_all("#slider-element\d*\.png#", $file)) {
                            $count++;
                            $sliderElements[] = new Slider("$sliderDir/$file");
                        }
                    }
                    $blocks[] = $sliderElements;
                }
                closedir($dh);
            }

            $carouselJScontent = "
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.carousel');
                var instances = M.Carousel.init(elems);
              });
              ";
            $carouselFileJS = fopen($pathOfCarouselJS, "w+");
            fwrite($carouselFileJS, $carouselJScontent);
            fclose($carouselFileJS);
        }


        if ($_POST['footer']) {
            $footer = new Footer($_POST['footer'], $_POST["alignFooter"], $_POST["footer_background_color"], $_POST["footer_color"]);
            $blocks[] = $footer;
        }

        /* создание модели */
        if ($_POST['title']) {
            $model = new Model($blocks, $_POST['title']);
        } else {
            $model = new Model($blocks);
        }

        $str_land = $model->generate();
        $path = "{$this->dir}/mini.html";
        $f = fopen($path, "w+");
        fwrite($f, $str_land);
        fclose($f);

        $cssFilePath = "{$this->dir}/style.css";
        $cssFile = fopen($cssFilePath, "w+");
        fwrite($cssFile, $styles);
        fclose($cssFile);

        header("Location: ../index.php");
        ob_flush();
    }
}

$controller = new Controller('../landing');
$controller->action();

include "./create_archive.php";
?>
<div class="row center">
    <iframe width="800" height="400" src="landing/mini.html"></iframe>
</div>