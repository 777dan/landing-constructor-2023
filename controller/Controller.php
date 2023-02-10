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
            $header = new Header($_POST['header']);
            $blocks[] = $header;
        }
        $logo = $_FILES['file'];
        $tmp_logo = $logo['tmp_name'];
        move_uploaded_file($tmp_logo, "../model/images/logo.png");

        if ($_POST['text']) {
            $text = new Text($_POST['text']);
            $blocks[] = $text;
        }

        for ($i = 0; $i < $_COOKIE['user']; $i++) {
            if ($_POST["form" . $i + 1]) {
                $nameSelect = "selectType" . ($i + 1);
                $form[] = new Form($_POST["form" . $i + 1], $_POST[$nameSelect]);
            }
        }
        $blocks[] = $form;

        if ($_POST['footer']) {
            $footer = new Footer($_POST['footer']);
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

        header("Location: ../index.php");
        ob_flush();
    }
}

$controller = new Controller('../landing');
$controller->action();
