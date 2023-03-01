//создание основных input для создания формы
// const addNewInputForForm = document.querySelector("#newInput");
// addNewInputForForm.addEventListener("click", addInputsForForm);
// const br = document.createElement("br");
// let selectTypeArr = [];
// let smallFormsArr = [];
// let inputsSetLinkArr = [];

// function addInputsForForm() {
//     const parent = document.getElementById("form");
//     const div = document.createElement("div");
//     const select = document.createElement("select");
//     const input = document.createElement("input");
//     div.id = `createInput${selectTypeArr.length + 1}`;
//     div.className = "createInputs";
//     const option1 = document.createElement("option");
//     option1.value = `submit${selectTypeArr.length + 1}`;
//     option1.className = "submits";
//     const option2 = document.createElement("option");
//     option2.value = `text${selectTypeArr.length + 1}`;
//     const option3 = document.createElement("option");
//     // option3.disabled = 'disabled';
//     // option3.selected = 'selected';
//     input.type = 'text';
//     input.style.marginLeft = "10px !important";
//     let formName = `form${smallFormsArr.length + 1}`;
//     smallFormsArr.push(formName);
//     input.name = formName;
//     input.value = '';
//     input.placeholder = 'Введите текст для input';
//     input.className = 'design light-green lighten-5'
//     let selectName = `selectType${selectTypeArr.length + 1}`;
//     selectTypeArr.push(selectName)
//     select.name = selectName;

//     parent.appendChild(div);
//     div.appendChild(select);
//     select.appendChild(option1);
//     option1.innerHTML = "Кнопка";
//     select.appendChild(option2);
//     option2.innerHTML = "Поле ввода";
//     select.appendChild(option3);
//     div.appendChild(input);
//     document.cookie = `inputsForFormLength=${smallFormsArr.length}`;
// }

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
        types.attr("name", `inputTypes${inputsArr.length}`)
        for (let i = 0; i < typesArr.length; i++) {
            let type = $("<option></option>");
            type.attr("value", typesArr[i][0] + inputsArr.length);
            type.text(typesArr[i][1]);
            types.append(type);
        }
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