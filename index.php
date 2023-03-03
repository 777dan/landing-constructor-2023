<?php
setcookie("numberOfinputs");
setcookie("numberOfsliderElements");
setcookie("numberOflinks");
setcookie("numberOftexts");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                <input type="text" name="title" value="" placeholder="Введите title страницы" class="design light-green lighten-5" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Заголовок страницы</h3>
                <input type="text" name="header" value="" placeholder="Введите заголовок страницы" class="design light-green lighten-5" />
                <details>
                    <summary>Дополнительные настройки</summary>
                    <h5>Выравнивание заголовка</h5>
                    <label>
                        <input class="blue-text text-darken-2" type="radio" name="alignHeader" value="center">
                        <span>По центру</span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" checked name="alignHeader" value="left">
                        <span>По левому краю</span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="alignHeader" value="right">
                        <span>По правому краю</span>
                    </label>
                    <br>
                    <h5>Настройки фона</h5>
                    <select name="b_Settings" id="b_Settings">
                        <option value="b_image">Фоновое изображение</option>
                        <option value="b_color" selected>Фоновый цвет</option>
                    </select>
                    <div id="b_set">
                    </div>
                    <h5>Цвет текста</h5>
                    <input type="color" name="header_color" value="#000000" class="design" />
                </details>
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Текст страницы</h3>
                <div id="texts">
                </div><br>
                <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newText" value="Добавить новый абзац" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Form страницы</h3>
                <div id="form">
                </div><br>
                <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newInput" value="Добавить новый input" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Ссылки</h3>
                <div id="links">
                </div><br>
                <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newLink" value="Добавить новую ссылку" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Слайдер (карусель)</h3>
                <div id="sliderElements">
                </div><br>
                <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newSliderElement" value="Добавить новый элемент для слайдера" />
            </div>
            <div class="divider light-green darken-1"></div>
            <div class="section">
                <h3>Футер страницы</h3>
                <input type="text" name="footer" value="" placeholder="Введите текст для футера страницы" class="design light-green lighten-5" />
                <details>
                    <summary>Дополнительные настройки</summary>
                    <h5>Выравнивание футера</h5>
                    <label>
                        <input class="blue-text text-darken-2" type="radio" name="alignFooter" value="center">
                        <span>По центру</span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" checked name="alignFooter" value="left">
                        <span>По левому краю</span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="alignFooter" value="right">
                        <span>По правому краю</span>
                    </label>
                    <h5>Цвет фона</h5>
                    <input type="color" name="footer_background_color" value="#FFFFFF" class="design" />
                    <h5>Цвет текста</h5>
                    <input type="color" name="footer_color" value="#000000" class="design" />
                </details>
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
        </form>
        <div class="divider light-green darken-1"></div>
        <div id="result" class="row center">
            <h3>Результат</h3>
            <a href='landing/mini.html' class="design btn waves-effect waves-light light-green lighten-2 black-text" target="_blank">Посмотреть результат в новом окне</a>
            <a href="./landing.zip" class="design btn waves-effect waves-light light-green lighten-2 black-text" download>Скачать zip-архив файла</a>
            <span class="reload design btn waves-effect waves-light light-green lighten-2 black-text">Обновить показ сайта в мини-окне</span>
        </div>
        <div class="row center">
            <iframe id="showPage" width="800" height="400" src="landing/mini.html"></iframe>
        </div>
        <script>
            document.querySelector('.reload').addEventListener('click', event => {
                document.getElementById('showPage').contentWindow.location.reload(true);
            });
        </script>
    </div>
    <footer class="page-footer light-green lighten-2">
        <div class="container">
            <div class="row">
                <h5 class="center-align black-text">Конструктор Landing Page</h5>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="center-align container black-text">
                © 2023 Никитин Данил
            </div>
        </div>
    </footer>
    <script src="./special-elems/b_header.js"></script>
    <script src="./special-elems/newSliderElement.js"></script>
    <script src="./special-elems/newInput.js"></script>
    <script src="./special-elems/newLink.js"></script>
    <script src="./special-elems/newText.js"></script>
</body>

</html>