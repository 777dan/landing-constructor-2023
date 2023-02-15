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
            $header = new Header($_POST['header'], $_POST["alignHeader"]);
            $blocks[] = $header;
        }
        $logo = $_FILES['file'];
        $tmp_logo = $logo['tmp_name'];
        move_uploaded_file($tmp_logo, "../images/logo.png");

        if ($_POST['text']) {
            $text = new Text($_POST['text']);
            $blocks[] = $text;
        }

        // $inputsLength = explode(".", $_COOKIE['user']);

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

        $dir = "../images/";
        if (isset($_COOKIE['inputsForSliderLength'])) {
            for ($i = 0; $i < $_COOKIE['inputsForSliderLength']; $i++) {
                $slider_element = $_FILES['uploadImgForm' . $i + 1];
                $tmp_slider_element = $slider_element['tmp_name'];
                move_uploaded_file($tmp_slider_element, $dir . "slider-element" . $i + 1 . ".png");
            }
        }

        $count = 0;
        $slider_elements = array();
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (preg_match_all("#slider-element\d*\.png#", $file)) {
                        $count++;
                        $slider_elements[] = new Slider($dir . $file);
                    }
                }
                $blocks[] = $slider_elements;
            }
            closedir($dh);
        }


        if ($_POST['footer']) {
            $footer = new Footer($_POST['footer']);
            $blocks[] = $footer;
        }
        print_r($blocks);
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

        header("Location: ../index.php");
        ob_flush();
    }
}

$controller = new Controller('../landing');
$controller->action();
