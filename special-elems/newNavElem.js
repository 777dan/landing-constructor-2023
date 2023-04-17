//создание input для создания новых элементов навигационного меню
$(document).ready(function () {
  let navElemsArr = [];
  $("#newNavElem").click(function () {
    navElemsArr.push(`navElem${navElemsArr.length + 1}`);
    document.cookie = `numberOfnavElems=${navElemsArr.length}`;
    let div = $("<div></div>");
    div.attr("class", "creatingNavElems");

    let name = $("<input/>");
    name.attr("type", "text");
    name.attr("name", `navElemName${navElemsArr.length}`);
    name.attr("placeholder", "Текст элемента навигаицонного меню");
    name.attr("class", "design light-green lighten-5");
    let href = $("<input/>");
    href.attr("type", "text");
    href.attr("name", `navElemHref${navElemsArr.length}`);
    href.attr("placeholder", "Ссылка");
    href.attr("class", "additionalInputs design light-green lighten-5");
    $("#nav-elems").append(div);
    div.append(name);
    div.append(href);
    div.after("<br/>");

    let details = $("<details></details>");
    let summary = $("<summary></summary>").text("Дополнительные настройки");
    div.append(details);
    details.append(summary);

    let headerTextColor = $("<h5></h5>").text("Цвет текста");
    details.append(headerTextColor);
    let inputTextColor = $("<input></input>");
    inputTextColor.attr("type", "color");
    inputTextColor.attr("name", `navElemTextColor${navElemsArr.length}`);
    inputTextColor.attr("value", "#000000");
    inputTextColor.attr("class", "design");
    details.append(inputTextColor);
  });
});