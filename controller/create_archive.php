<?php
$zipDir = '../landing.zip';
if (file_exists($zipDir)) {
    unlink($zipDir);
}

//потенциальные пути к файлам landing page
$mainDir = "../landing/";
$main_file = $mainDir . "mini.html";
$imagesDir = $mainDir . "images/";
$logoDir = $imagesDir . 'logo/logo.png';
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

//проверка и архивация js-файла для слайдера (карусель)
if (file_exists($carouselJS)) {
    $zip->addFile($carouselJS, "landing/carousel.js");
}

//проверка и архивация изображения для заголовка
if (file_exists($logoDir)) {
    $zip->addFile($logoDir, "landing/images/logo/logo.png");
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
