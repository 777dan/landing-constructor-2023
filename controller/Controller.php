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

        $parallax_file = "{$this->dir}/parallax.js";
        if (file_exists($parallax_file)) {
            unlink($parallax_file);
        }

        $navbarJSpath = "{$this->dir}/navbar.js";
        if (file_exists($navbarJSpath)) {
            unlink($navbarJSpath);
        }
        /* создание блоков */
        if (isset($_COOKIE['numberOfnavElems'])) {
            // $navbarJS = fopen($navbarJSpath, "w");
            // $nabarJScontent = "(function ($) {
            //     $(function () {
            //         $('.sidenav').sidenav();
            //     });
            // })(jQuery);";
            // fwrite($navbarJS, $nabarJScontent);
            // fclose($navbarJS);
            for ($i = 0; $i < $_COOKIE['numberOfnavElems']; $i++) {
                $navbar[] = new Navbar($_POST["logo_name"], $_POST["navElemName" . $i + 1], $_POST["navElemHref" . ($i + 1)], $_POST["navElemTextColor" . ($i + 1)], $_POST["navbar_color"]);
            }
            $blocks[] = $navbar;
        }

        if ($_POST['header']) {
            $background_color_header = "transparent";
            $h_alignPercents = "50%";
            if ($_POST["alignHeader"] == "left") $h_alignPercents = "10%";
            if ($_POST["alignHeader"] == "right") $h_alignPercents = "90%";
            $h_align = [$_POST["alignHeader"], $h_alignPercents];
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
            if ($_POST['b_Settings'] === "b_color") $background_color_header = $_POST['b_color'];
            $header = new Header($_POST['header'], $h_align, $background_color_header, $_POST['header_color']);
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

        $materializeJSpath = "{$this->dir}/materialize.js";
        if (!file_exists($materializeJSpath)) {
            $materializeJS = fopen($materializeJSpath, "w");
            copy("../materialize.js", $materializeJSpath);
            fclose($materializeJS);
        }


        if (isset($_FILES['b_image']['name']) || isset($_COOKIE['numberOfsliderElements'])) {
            mkdir($imagesDir);
            if ($_FILES['b_image']['name'] != "") {
                mkdir($b_imageDir);
            }
            if (isset($_COOKIE['numberOfsliderElements'])) {
                mkdir($sliderDir);
            }
        }

        if (isset($_FILES['b_image']['name'])) {
            $b_image = $_FILES['b_image'];
            $tmp_b_image = $b_image['tmp_name'];
            move_uploaded_file($tmp_b_image, "../landing/images/b_image/b_image.png");
        }

        if ($_POST['CTA_name'] && $_POST['CTA_href']) {
            $align = "";
            if ($_POST['alignCTA'] === "center") {
                $align = "margin-left: auto;margin-right: auto;";
            }
            if ($_POST['alignCTA'] === "right") {
                $align = "margin-left: auto;";
            }
            if ($_POST['alignCTA'] === "left") {
                $align = "margin-right: auto;";
            }

            // $align = "margin-left: auto;margin-right: auto;";
            $CTA = new CTA($_POST['CTA_name'], $_POST['CTA_href'], $align, $_POST['CTA_color'], $_POST['CTA_text_color']);
            $blocks[] = $CTA;
        }

        if (isset($_COOKIE['numberOftexts'])) {
            for ($i = 1; $i <= $_COOKIE['numberOftexts']; $i++) {
                if ($_POST["text$i"]) {
                    $textTypes = "textTypes$i";
                    $textType = "";
                    if (preg_match("#paragraph\d*#", $_POST[$textTypes])) $textType = "p";
                    if (preg_match("#header\d*#", $_POST[$textTypes])) $textType = "h3";
                    if ($_POST["id_name_text$i"]) {
                        $id_name_text = "id='" . $_POST["id_name_text$i"] . "'";
                    } else {
                        $id_name_text = "";
                    }
                    $texts[] = new Text($_POST["text$i"], $_POST["alignText$i"], $_POST["text_background$i"], $_POST["text_color$i"], $textType, $id_name_text);
                }
            }
            $blocks[] = $texts;
        }

        if (isset($_COOKIE['numberOflinks'])) {
            for ($i = 0; $i < $_COOKIE['numberOflinks']; $i++) {
                if ($_POST["linkName" . $i + 1]) {
                    $links[] = new Link($_POST["linkName" . $i + 1], $_POST["linkHref" . ($i + 1)], $_POST["link_color" . ($i + 1)], $_POST["link_text_color" . ($i + 1)]);
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
                if ($_POST['id_name_slider']) {
                    $id_name_slider = "id='" . $_POST['id_name_slider'] . "'";
                } else {
                    $id_name_slider = "";
                }
                if ($dh = opendir($sliderDir)) {
                    while (($file = readdir($dh)) !== false) {
                        if (preg_match_all("#slider-element\d*\.png#", $file)) {
                            $count++;
                            $sliderElements[] = new Slider("$sliderDir/$file", $id_name_slider);
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


        if (isset($_COOKIE['numberOfFooterCols'])) {
            $numberOfFooterColElems = explode(",", $_COOKIE['numberOfFooterColElems']);
            array_pop($numberOfFooterColElems);
            for ($j = 0; $j < count($numberOfFooterColElems); $j++) {
                $colElemsArr = [];
                $colElemsHrefArr = [];
                for ($index = 0; $index < (int)$numberOfFooterColElems[$j]; $index++) {
                    $colElems = $_POST["colElem" . $j + 1 . "_" . $index + 1];
                    $colElemsHref = $_POST["colElemHref" . $j + 1 . "_" . $index + 1];
                    $colElemsArr[] = $colElems;
                    $colElemsHrefArr[] = $colElemsHref;
                }
                $footer[] = new Footer($_POST['footer_logo_name'], $_POST["footer_text_color"], $_POST["footer_bg_color"], $_POST["footerColHeader" . $j + 1], $colElemsArr, $colElemsHrefArr);
            }
            $blocks[] = $footer;
        }

        /* создание модели */


        if ($_POST['title']) {
            $model = new Model($blocks, $_POST['title']);
        } else {
            $model = new Model($blocks);
        }

        $str_land = $model->generate();
        $path = "{$this->dir}/index.html";
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
    <iframe width="800" height="400" src="landing/index.html"></iframe>
</div>