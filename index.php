<?php
setcookie("inputsForFormLength");
setcookie("inputsForSliderLength");
// if (isset($_COOKIE['inputsForSliderLength'])) {
//     setcookie("Yes", "Ya");
// }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Landing-page constructor</title>
</head>

<body class="light-green lighten-3">
    <div class="container">
        <h2 class="center-align">Конструктор Landing Page</h2>
    </div>
    <div class="container">
        <form enctype="multipart/form-data" action="controller/Controller.php" method="post">
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Title страницы</h3>
                <input type="input" name="title" value="" placeholder="Введите title страницы" class="design light-green lighten-5" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Заголовок страницы</h3>
                <input type="input" name="header" value="" placeholder="Введите заголовок страницы" class="design light-green lighten-5" />
                <details>
                    <summary>Дополнительные настройки</summary>
                    <h5>Картинка для заголовка</h5>
                    <input type="file" name="file" value="" class="design light-green lighten-5" />
                    <h5>Выравнивание заголовка</h5>
                    <label>
                        <input type="radio" name="alignHeader" value="center">
                        По центру
                    </label>
                    <br>
                    <label>
                        <input type="radio" checked name="alignHeader" value="left">
                        По левому краю
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="alignHeader" value="right">
                        По правому краю
                    </label>
            </div>
            </details>
            <!-- <h5>Картинка для заголовка</h5>
                <input type="file" name="file" value="" class="design light-green lighten-5" />
                <h5>Выравнивание заголовка</h5>
                <label>
                    <input type="radio" name="alignHeader" value="center">
                    По центру
                </label>
                <br>
                <label>
                    <input type="radio" checked name="alignHeader" value="left">
                    По левому краю
                </label>
                <br>
                <label>
                    <input type="radio" name="alignHeader" value="right">
                    По правому краю
                </label>
            </div> -->
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Текст страницы</h3>
                <textarea name="text" value="" placeholder="Введите текст страницы" class="design light-green lighten-5"></textarea>
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Form страницы</h3>
                <div id="inputs">
                </div><br>
                <input type="button" id="addNewInput" value="+" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Слайдер (карусель)</h3>
                <div id="slider_elements">
                </div><br>
                <input type="button" id="addNewSlider_elements" value="+" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Футер страницы</h3>
                <input type="input" name="footer" value="" placeholder="Введите текст для футера страницы" class="design light-green lighten-5" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Цвет фона</h3>
                <input type="color" name="color" value="#FFFFFF" class="design" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Генерация</h3>
                <input type="submit" name="submitB" value="Сгенерировать Landing Page" class="design btn waves-effect waves-light light-green lighten-2" id="ok" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="row center">
                <h3>Результат</h3>
                <a href='landing/mini.html' class="design btn waves-effect waves-light light-green lighten-2 black-text" target="_blank">Посмотреть результат в новом окне</a>
            </div>
        </form>
        <div class="row center">
            <iframe width="800" height="400" src="landing/mini.html"></iframe>
        </div>
    </div>
    <script src="./inputs_creating/inputs-creating-for-form.js"></script>
    <script src="./inputs_creating/inputs-creating-for-carousel.js"></script>
</body>

</html>