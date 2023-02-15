//создание input для создания формы
const addNewInputForForm = document.getElementById("addNewInput");
addNewInputForForm.addEventListener("click", addInputsForForm);
let selectTypeArr = [];
let smallFormsArr = [];

function addInputsForForm() {
    const parent = document.getElementById("inputs");
    const select = document.createElement("select");
    const input = document.createElement("input");
    let selectName = `selectType${selectTypeArr.length + 1}`;
    selectTypeArr.push(selectName)
    select.name = selectName;
    const option1 = document.createElement("option");
    option1.value = 'submit';
    const option2 = document.createElement("option");
    option2.value = 'text';
    input.type = 'input';
    let formName = `form${smallFormsArr.length + 1}`;
    smallFormsArr.push(formName);
    input.name = formName;
    input.value = '';
    input.placeholder = 'Введите текст для input';
    input.className = 'design light-green lighten-5'
    const br = document.createElement("br");

    parent.appendChild(select);
    select.appendChild(option1);
    option1.innerHTML = "Кнопка";
    select.appendChild(option2);
    option2.innerHTML = "Поле ввода";
    parent.appendChild(input);
    parent.appendChild(br);
    document.cookie = `inputsForFormLength=${smallFormsArr.length}`;
}