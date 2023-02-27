<?php
require "../autoload.php";
class Controller
{
    private $dir;

    public function __construct($dir)
    {
        $this->dir = $dir;

        if (!is_dir($this->dir)) {
            mkdir($this->dir); // створення каталогу 'landing'
        }
    }

    public function action()
    {
        $blocks = array();
        ob_start();
        /* створення блоків */
        if ($_POST['header']) {
            $header = new Header($_POST['header'], $_POST["alignHeader"], $_POST["header_background_color"], $_POST["header_color"]);
            $blocks[] = $header;
        }

        $imagesDir = "{$this->dir}/images";
        $logoDir = '../landing/images/logo';
        $sliderDir = '../landing/images/slider';
        if (is_dir($imagesDir)) {
            if (is_dir($logoDir)) {
                if (file_exists("$logoDir/logo.png")) {
                    unlink("$logoDir/logo.png");
                    rmdir($logoDir);
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


        if ($_FILES['logo']['name'] != "" || isset($_COOKIE['inputsForSliderLength'])) {
            mkdir($imagesDir);
            if ($_FILES['logo']['name'] != "") {
                mkdir($logoDir);
            }
            if (isset($_COOKIE['inputsForSliderLength'])) {
                mkdir($sliderDir);
            }
        }

        $logo = $_FILES['logo'];
        $tmp_logo = $logo['tmp_name'];
        move_uploaded_file($tmp_logo, "../landing/images/logo/logo.png");

        if ($_POST['text']) {
            $text = new Text($_POST['text'], $_POST["alignText"], $_POST["text_background_color"], $_POST["text_color"]);
            $blocks[] = $text;
        }

        if (isset($_COOKIE['inputsForFormLength'])) {
            $true_or_false = false;
            for ($i = 0; $i < $_COOKIE['inputsForFormLength']; $i++) {
                if ($_POST["form" . $i + 1]) {
                    $nameSelect = "selectType" . ($i + 1);
                    $form[] = new Form($_POST["form" . $i + 1], $_POST[$nameSelect]);
                }
                $true_or_false = true;
            }
            if ($true_or_false == true) $blocks[] = $form;
        }

        if (isset($_COOKIE['inputsForLinksLength'])) {
            for ($i = 0; $i < $_COOKIE['inputsForLinksLength']; $i++) {
                if ($_POST["linkName" . $i + 1]) {
                    $hrefName = "hrefName" . ($i + 1);
                    $links[] = new Link($_POST["linkName" . $i + 1], $_POST[$hrefName]);
                }
            }
            $blocks[] = $links;
        }

        if (isset($_COOKIE['inputsForSliderLength'])) {
            for ($i = 0; $i < $_COOKIE['inputsForSliderLength']; $i++) {
                $slider_element = $_FILES['uploadImgForm' . $i + 1];
                $tmp_slider_element = $slider_element['tmp_name'];
                move_uploaded_file($tmp_slider_element, $sliderDir . "/slider-element" . $i + 1 . ".png");
            }

            $count = 0;
            $slider_elements = array();
            if (is_dir($sliderDir)) {
                if ($dh = opendir($sliderDir)) {
                    while (($file = readdir($dh)) !== false) {
                        if (preg_match_all("#slider-element\d*\.png#", $file)) {
                            $count++;
                            $slider_elements[] = new Slider("$sliderDir/$file");
                        }
                    }
                    $blocks[] = $slider_elements;
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

        /* створення модели */
        if ($_POST['title']) {
            $model = new Model($blocks, $_POST['title']);
        } else {
            $model = new Model($blocks);
        }

        /* Робота с моделлю */
        $str_land = $model->generate(); // генерація тексту лендинга

        $path = "{$this->dir}/mini.html";
        $f = fopen($path, "w+"); // створення файлу лендинга по вказаному шляху
        fwrite($f, $str_land); // запис в файл лендингу
        fclose($f);

        // $pathOfCarouselJS = "{$this->dir}/carousel.js";
        // $carouselFileJS = fopen($pathOfCarouselJS, "w+");
        // fwrite($carouselFileJS, "document.addEventListener('DOMContentLoaded', function() {
        //     var elems = document.querySelectorAll('.carousel');
        //     var instances = M.Carousel.init(elems);
        //   });");
        // fclose($carouselFileJS);

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