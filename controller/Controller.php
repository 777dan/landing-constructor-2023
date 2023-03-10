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
        if ($_POST['header']) {
            $background_color_header = "transparent";
            if ($_POST['b_Settings'] === "b_image") {
                $parallaxJScontent = "document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.parallax');
                    var instances = M.Parallax.init(elems);
                });";
                $parallaxJSpath = "{$this->dir}/parallax.js";
                $parallsxFile = fopen($parallaxJSpath, "w+");
                fwrite($parallsxFile, $parallaxJScontent);
                fclose($parallsxFile);
            }
            if ($_POST['b_Settings'] === "b_color") $background_color_header = $_POST['b_Settings'];
            $header = new Header($_POST['header'], $_POST["alignHeader"], $background_color_header);
            $blocks[] = $header;
        }

        $imagesDir = "{$this->dir}/images";
        $b_imageDir = '../landing/images/b_image';
        $sliderDir = '../landing/images/slider';
        if (is_dir($imagesDir)) {
            if (is_dir($b_imageDir)) {
                if (file_exists("$b_imageDir/b_image.png")) {
                    unlink("$b_imageDir/b_image.png");
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

        if (isset($_COOKIE['numberOftexts'])) {
            for ($i = 1; $i <= $_COOKIE['numberOftexts']; $i++) {
                if ($_POST["text$i"]) {
                    $textTypes = "textTypes$i";
                    $textType = "";
                    if (preg_match("#span\d*#", $_POST[$textTypes])) $textType = "span";
                    if (preg_match("#paragraph\d*#", $_POST[$textTypes])) $textType = "p";
                    if (preg_match("#header\d*#", $_POST[$textTypes])) $textType = "h3";
                    $texts[] = new Text($_POST["text$i"], $_POST["alignText$i"], $_POST["text_background$i"], $_POST["text_color$i"], $textType);
                }
            }
            $blocks[] = $texts;
        }

        if (isset($_COOKIE['numberOfinputs'])) {
            $true_or_false = false;
            for ($i = 0; $i < $_COOKIE['numberOfinputs']; $i++) {
                if ($_POST["inputName" . $i + 1]) {
                    $inputTypes = "inputTypes" . ($i + 1);
                    $inputType = "";
                    $name = "";
                    if (preg_match("#submit\d*#", $_POST[$inputTypes])) $inputType = "submit";
                    if (preg_match("#text\d*#", $_POST[$inputTypes])) $inputType = "text";
                    $name = $inputType . $i + 1;
                    $form[] = new Form($_POST["inputName" . $i + 1], $inputType, $name);
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