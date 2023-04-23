<?php
setcookie("numberOfsliderElements");
setcookie("numberOflinks");
setcookie("numberOfnavElems");
setcookie("numberOfFooterCols");
setcookie("numberOfFooterColElems");
setcookie("numberOftexts");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Landing-page constructor</title>
</head>

<body class="light-green lighten-3">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="center-align">Конструктор Landing Page</h2>
            </div>
        </div>
        <div class="row">
            <form enctype="multipart/form-data" action="controller/Controller.php" method="post">
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Title страницы</h3>
                        <input type="text" name="title" value="" placeholder="Введите title страницы" class="design light-green lighten-5" />
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Навигационное меню</h3>
                        <h5>Логотип</h5>
                        <input type="text" name="logo_name" value="" placeholder="Введите текст для логотипа" class="design light-green lighten-5" />
                        <h5>Цвет фона</h5>
                        <input type="color" name="navbar_color" value="#FFFFFF" class="design" />
                        <h5>Элементы навигационного меню</h5>
                        <div id="nav-elems">
                        </div><br>
                        <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newNavElem" value="Добавить новый элемент навигационного меню" />
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Заголовок страницы</h3>
                        <input type="text" name="header" value="" placeholder="Введите заголовок страницы" class="design light-green lighten-5" />
                        <details>
                            <summary>Дополнительные настройки</summary>
                            <h5>Выравнивание заголовка</h5>
                            <label>
                                <input class="blue-text text-darken-2" checked type="radio" name="alignHeader" value="center">
                                <span>По центру</span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="alignHeader" value="left">
                                <span>По левому краю</span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="alignHeader" value="right">
                                <span>По правому краю</span>
                            </label>
                            <br>
                            <h5>Цвет текста</h5>
                            <input type="color" name="header_color" value="#000000" class="design" />
                            <br>
                            <h5>Настройки фона</h5>
                            <select name="b_Settings" id="b_Settings">
                                <option value="b_image">Фоновое изображение</option>
                                <option value="b_color" selected>Фоновый цвет</option>
                            </select>
                            <div id="b_set">
                            </div>
                            <br>
                        </details>
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Текст страницы</h3>
                        <div id="texts">
                        </div><br>
                        <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newText" value="Добавить новый абзац" />
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>CTA для страницы</h3>
                        <div id="CTA">
                        </div><br>
                        <input type="text" class="design light-green lighten-5" name="CTA_name" placeholder="Введите текст для CTA" /><br>
                        <input type="text" class="design light-green lighten-5" name="CTA_href" placeholder="Введите ссылку для CTA" />
                        <details>
                            <summary>Дополнительные настройки</summary>
                            <h5>Выравнивание CTA</h5>
                            <label>
                                <input class="blue-text text-darken-2" checked type="radio" name="alignCTA" value="center">
                                <span>По центру</span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="alignCTA" value="left">
                                <span>По левому краю</span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="alignCTA" value="right">
                                <span>По правому краю</span>
                            </label>
                            <h5>Цвет CTA</h5>
                            <input type="color" name="CTA_color" value="#FFFFFF" class="design" />
                            <h5>Цвет текста</h5>
                            <input type="color" name="CTA_text_color" value="#000000" class="design" />
                        </details>
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Ссылки</h3>
                        <div id="links">
                        </div><br>
                        <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newLink" value="Добавить новую ссылку" />
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Слайдер (карусель)</h3>
                        <div id="sliderElements">
                        </div><br>
                        <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newSliderElement" value="Добавить новый элемент для слайдера" />
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Футер страницы</h3>
                        <h5>Логотип</h5>
                        <input type="text" name="footer_logo_name" value="" placeholder="Введите текст для логотипа" class="design light-green lighten-5" />
                        <h5>Колонки футера</h5>
                        <div id="footer-cols">
                        </div><br>
                        <input type="button" class="design btn waves-effect waves-light light-green lighten-2" id="newFooterCol" value="Добавить новую колонку футера" />
                        <h5>Цвет фона</h5>
                        <input type="color" name="footer_bg_color" value="#FFFFFF" class="design" />
                        <h5>Цвет текста</h5>
                        <input type="color" name="footer_text_color" value="#000000" class="design" />
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Цвет фона</h3>
                        <input type="color" name="color" value="#FFFFFF" class="design" />
                    </div>
                </div>
                <div class="col s12">
                    <div class="divider light-green darken-1"></div>
                    <div class="section">
                        <h3>Генерация</h3>
                        <input type="submit" name="submitB" value="Сгенерировать Landing Page" class="design btn waves-effect waves-light light-green lighten-2" id="ok" />
                    </div>
                </div>
            </form>
            <div class="col s12 center">
                <div class="divider light-green darken-1"></div>
                <div id="result">
                    <h3>Результат</h3>
                    <a href='landing/mini.html' class="design btn waves-effect waves-light light-green lighten-2 black-text" target="_blank">Посмотреть результат в новом окне</a>
                    <a href="./landing.zip" class="design btn waves-effect waves-light light-green lighten-2 black-text" download>Скачать zip-архив файла</a>
                    <span class="reload design btn waves-effect waves-light light-green lighten-2 black-text">Обновить показ сайта в мини-окне</span>
                </div>
            </div>
            <div class="col s12 center">
                <iframe id="showPage" src="landing/mini.html"></iframe>
                <script>
                    document.querySelector('.reload').addEventListener('click', event => {
                        document.getElementById('showPage').contentWindow.location.reload(true);
                    });
                </script>
            </div>
        </div>
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
    <script src="./special-elems/newLink.js"></script>
    <script src="./special-elems/newNavElem.js"></script>
    <script src="./special-elems/newFooterCol.js"></script>
    <script src="./special-elems/newText.js"></script>
</body>

</html>