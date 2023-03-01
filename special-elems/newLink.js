//создание input для создания ссылок
$(document).ready(function () {
    let linkArr = [];
    $("#newLink").click(function () {
        linkArr.push(`link${linkArr.length + 1}`);
        document.cookie = `numberOflinks=${linkArr.length}`;
        let name = $("<input/>");
        name.attr("type", "text");
        name.attr("name", `linkName${linkArr.length}`);
        name.attr("placeholder", "Название ссылки");
        name.attr("class", "design light-green lighten-5");
        let href = $("<input/>");
        href.attr("type", "text");
        href.attr("name", `linkHref${linkArr.length}`);
        href.attr("placeholder", "Ссылка");
        href.attr("class", "additionalInputs design light-green lighten-5");
        $("#links").append(name);
        $("#links").append(href);
        $("#links").append("<br/>");
    });
});