//создание основных input для создания формы
$(document).ready(function () {
    let inputsArr = [];
    const typesArr = [
        ["submit", "Кнопка"],
        ["text", "Поле ввода"],
    ];
    $("#newInput").click(function () {
        inputsArr.push(`input${inputsArr.length + 1}`);
        document.cookie = `numberOfinputs=${inputsArr.length}`;
        let types = $("<select></select>");
        let div = $("<div></div>");
        div.attr("class", "creatingInputs");
        types.attr("name", `inputTypes${inputsArr.length}`);

        $.each(typesArr, function (i, value) {
            let type = $("<option></option>");
            type.attr("value", value[0] + inputsArr.length);
            type.text(value[1]);
            types.append(type);
        });
        let name = $("<input/>");
        name.attr("type", "text");
        name.attr("name", `inputName${inputsArr.length}`);
        name.attr("placeholder", "Введите текст для input");
        name.attr("class", "design light-green lighten-5");
        $("#form").append(div);
        div.append(types);
        types.after(name);
        // name.after("<br/>");
    });
});