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

        let details = $("<details></details>");
        let summary = $("<summary></summary>").text("Дополнительные настройки");
        $("#links").append(details);
        details.append(summary);

        let headerBackground = $("<h5></h5>").text("Цвет ссылки");
        details.append(headerBackground);
        let inputColor = $("<input></input>");
        inputColor.attr("type", "color");
        inputColor.attr("name", `link_color${linkArr.length}`);
        inputColor.attr("value", "#FFFFFF");
        inputColor.attr("class", "design");
        details.append(inputColor);
        let headerTextColor = $("<h5></h5>").text("Цвет текста ссылки");
        details.append(headerTextColor);
        let inputTextColor = $("<input></input>");
        inputTextColor.attr("type", "color");
        inputTextColor.attr("name", `link_text_color${linkArr.length}`);
        inputTextColor.attr("value", "#000000");
        inputTextColor.attr("class", "design");
        details.append(inputTextColor);
    });
});