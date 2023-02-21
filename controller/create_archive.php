<?php
$zipDir = '../landing.zip';
if (file_exists($zipDir)) {
    unlink($zipDir);
}
$mainDir = "../landing/";
$imagesDir = $mainDir . "images/";
$logoDir = $imagesDir . 'logo/logo.png';
$sliderDir = $imagesDir . "slider";
$zip = new ZipArchive();
$arch = "landing.zip";
$zip->open($arch, ZIPARCHIVE::CREATE);
$main_file = "../landing/mini.html";
$zip->addFile($main_file, "landing/mini.html");
if (file_exists($logoDir)) {
    $zip->addFile($logoDir, "landing/images/logo/logo.png");
}
$files = scandir($sliderDir);
if (count($files) !== 0) {
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] !== "." && $files[$i] !== "..")
            $zip->addFile($sliderDir . '/' . $files[$i], "landing/images/slider/" . $files[$i]);
    }
}
$zip->close();
rename("./" . $arch, "../" . $arch);
