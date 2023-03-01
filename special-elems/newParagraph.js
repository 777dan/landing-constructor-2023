//создание input для создания новых абзацов
$(document).ready(function () {
  let paragraphsArr = [];
  $("#newParagraph").click(function () {
    paragraphsArr.push(`paragraph${paragraphsArr.length + 1}`);
    document.cookie = `numberOfparagraphs=${paragraphsArr.length}`;
    let paragraph = $("<textarea></textarea>");
    paragraph.attr("name", `paragraph${paragraphsArr.length}`);
    paragraph.attr("placeholder", "Введите текст страницы");
    paragraph.attr("class", "setParagraphes design light-green lighten-5");
    $("#paragraphs").append(paragraph);

    let details = $("<details></details>");
    let summary = $("<summary></summary>").text("Дополнительные настройки");
    let headerAlign = $("<h5></h5>").text("Выравнивание абзаца");
    const setAlign = [
      ["center", "По центру"],
      ["left", "По левому краю"],
      ["right", "По правому краю"]
    ];

    $("#paragraphs").append(details);
    details.append(summary);
    details.append(headerAlign);
    for (let i = 0; i < setAlign.length; i++) {
      let label = $("<label></label>");
      let span = $("<span></span>");
      let input = $("<input/>")
      details.append(label);
      input.attr("class", "blue-text text-darken-2");
      input.attr("type", "radio");
      input.attr("name", `alignText${paragraphsArr.length}`);
      input.attr("value", setAlign[i][0]);
      if (setAlign[i][0] === "center") {
        input.attr("checked", "checked");
      }
      label.append(input);
      span.text(setAlign[i][1]);
      label.append(span);
      label.after("<br/>");
    }
    details.after("<br/>");

    let headerBackground = $("<h5></h5>").text("Цвет фона");
    details.append(headerBackground);
    let inputBackground = $("<input></input>");
    inputBackground.attr("type", "color");
    inputBackground.attr("name", `paragraph_background${paragraphsArr.length}`);
    inputBackground.attr("value", "#FFFFFF");
    inputBackground.attr("class", "design");
    details.append(inputBackground);
    let headerTextColor = $("<h5></h5>").text("Цвет текста");
    details.append(headerTextColor);
    let inputTextColor = $("<input></input>");
    inputTextColor.attr("type", "color");
    inputTextColor.attr("name", `paragraph_color${paragraphsArr.length}`);
    inputTextColor.attr("value", "#000000");
    inputTextColor.attr("class", "design");
    details.append(inputTextColor);
  });
});