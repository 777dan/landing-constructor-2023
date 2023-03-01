<?php
$zipDir = '../landing.zip';
if (file_exists($zipDir)) {
    unlink($zipDir);
}

//потенциальные пути к файлам landing page
$mainDir = "../landing/";
$main_file = $mainDir . "mini.html";
$css_file = $mainDir . "style.css";
$imagesDir = $mainDir . "images/";
$b_imageDir = $imagesDir . 'b_image/b_image.png';
$sliderDir = $imagesDir . "slider";
$carouselJS = $mainDir . "carousel.js";

//создание архива
$zip = new ZipArchive();
$arch = "landing.zip";
$zip->open($arch, ZIPARCHIVE::CREATE);

//проверка и архивация главного html-файла
if (file_exists($main_file)) {
    $zip->addFile($main_file, "landing/mini.html");
}

//проверка и архивация главного css-файла
if (file_exists($css_file)) {
    $zip->addFile($css_file, "landing/style.css");
}

//проверка и архивация js-файла для слайдера (карусель)
if (file_exists($carouselJS)) {
    $zip->addFile($carouselJS, "landing/carousel.js");
}

//проверка и архивация изображения для заголовка
if (file_exists($b_imageDir)) {
    $zip->addFile($b_imageDir, "landing/images/b_image/b_image.png");
}

//проверка и архивация элементов слайдера (карусель)
$files = scandir($sliderDir);
if ($files !== false) {
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] !== "." && $files[$i] !== "..")
            $zip->addFile($sliderDir . '/' . $files[$i], "landing/images/slider/" . $files[$i]);
    }
}

$zip->close();
rename("./" . $arch, "../" . $arch);
