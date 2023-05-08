//создание input для создания новых абзацов
$(document).ready(function () {
  let textsArr = [];
  $("#newText").click(function () {
    textsArr.push(`text${textsArr.length + 1}`);
    document.cookie = `numberOftexts=${textsArr.length}`;
    let div = $("<div></div>");
    div.attr("class", "creatingTexts");

    let types = $("<select></select>");
    types.attr("name", `textTypes${textsArr.length}`);
    const textTypes = [
      ["paragraph", "Абзац"],
      ["header", "Заголовок"]
    ];
    $.each(textTypes, function (i, value) {
      let type = $("<option></option>");
      type.attr("value", value[0] + textsArr.length);
      type.text(value[1]);
      types.append(type);
    });

    let text = $("<textarea></textarea>");
    text.attr("name", `text${textsArr.length}`);
    text.attr("placeholder", "Введите текст страницы");
    text.attr("class", "setTexts design light-green lighten-5");
    $("#texts").append(div);
    div.append(types);
    div.append(text);

    let id_name = $("<input></input>");
    id_name.attr("name", `id_name_text${textsArr.length}`);
    id_name.attr("placeholder", "Введите id текста");
    id_name.attr("class", "setTexts design light-green lighten-5");
    div.append(id_name);

    let details = $("<details></details>");
    let summary = $("<summary></summary>").text("Дополнительные настройки");
    let headerAlign = $("<h5></h5>").text("Выравнивание текста");
    const setAlign = [
      ["center", "По центру"],
      ["left", "По левому краю"],
      ["right", "По правому краю"]
    ];

    div.append(details);
    details.append(summary);
    details.append(headerAlign);
    $.each(setAlign, function (i, value) {
      let label = $("<label></label>");
      let span = $("<span></span>");
      let input = $("<input/>")
      details.append(label);
      input.attr("class", "blue-text text-darken-2");
      input.attr("type", "radio");
      input.attr("name", `alignText${textsArr.length}`);
      input.attr("value", value[0]);
      if (value[0] === "center") {
        input.attr("checked", "checked");
      }
      label.append(input);
      span.text(value[1]);
      label.append(span);
      label.after("<br/>");
    });
    details.after("<br/>");

    let headerBackground = $("<h5></h5>").text("Цвет фона");
    details.append(headerBackground);
    let inputBackground = $("<input></input>");
    inputBackground.attr("type", "color");
    inputBackground.attr("name", `text_background${textsArr.length}`);
    inputBackground.attr("value", "#FFFFFF");
    inputBackground.attr("class", "design");
    details.append(inputBackground);
    let headerTextColor = $("<h5></h5>").text("Цвет текста");
    details.append(headerTextColor);
    let inputTextColor = $("<input></input>");
    inputTextColor.attr("type", "color");
    inputTextColor.attr("name", `text_color${textsArr.length}`);
    inputTextColor.attr("value", "#000000");
    inputTextColor.attr("class", "design");
    details.append(inputTextColor);
  });
});