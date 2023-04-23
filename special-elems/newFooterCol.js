$(document).ready(function () {
  let footerColsArr = [];
  
  $("#newFooterCol").click(function () {
    footerColsArr.push(`footerCol${footerColsArr.length + 1}`);
    document.cookie = `numberOfFooterCols=${footerColsArr.length}`;
    let div = $("<div></div>");
    div.attr("class", "creatingFooterCols");
    div.attr("id", `createCol${footerColsArr.length}`);
    let h6_header = $("<h6></h6>").text(`Заголовок колонки ${footerColsArr.length}`);

    let col_Header = $("<input/>");
    col_Header.attr("type", "text");
    col_Header.attr("name", `footerColHeader${footerColsArr.length}`);
    col_Header.attr("placeholder", `Текст заголовка колонки ${footerColsArr.length}`);
    col_Header.attr("class", "design light-green lighten-5");
    $("#footer-cols").append(div);
    div.append(h6_header);
    div.append(col_Header);

    let h6_colEmes = $("<h6></h6>").text(`Элементы колонки ${footerColsArr.length}`);
    let createCol_Elem = $("<input/>");
    createCol_Elem.attr("type", "button");
    createCol_Elem.attr("id", `newColElem${footerColsArr.length}`);
    createCol_Elem.attr("value", `Добавить новый элемент колонки ${footerColsArr.length}`);
    createCol_Elem.attr("class", "black-text design btn waves-effect waves-light light-green lighten-2");
    div.append(h6_colEmes);
    div.append(createCol_Elem);
    
    // обработчик нажатия на кнопку "Добавить новый элемент колонки"
    createCol_Elem.click(function () {
      let colNum = $(this).attr("id").replace("newColElem", "");;
      let col_Elem = $("<input/>");
      col_Elem.attr("type", "text");
      col_Elem.attr("name", `colElem${colNum}_${$(this).siblings("input[type=text]").length}`);
      col_Elem.attr("placeholder", "Текст элемента колонки");
      col_Elem.attr("class", "design light-green lighten-5");
      $(this).before(col_Elem);
      let colElems = "";
      $(".creatingFooterCols").each(function(i, value){
        colElems += `${$(`#createCol${i + 1}`).children("input[type=text]").length - 1},`;
      });
      document.cookie = `numberOfFooterColElems=${colElems}`;
    });
  });
});