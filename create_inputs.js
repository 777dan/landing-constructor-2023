const button = document.getElementById("addNewInput");
button.addEventListener("click", addInput);
let selectTypeArr = [];
let smallFormsArr = [];


function addInput() {
    const parent = document.getElementById("inputs");
    const select = document.createElement("select");
    let selectName = `selectType${selectTypeArr.length + 1}`;
    selectTypeArr.push(selectName)
    select.name = selectName;
    const option1 = document.createElement("option");
    option1.value = 'submit';
    const option2 = document.createElement("option");
    option2.value = 'text';
    const input = document.createElement("input");
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
    parent.appendChild(br);
    document.cookie = `user=${smallFormsArr.length}`;
}

// document.cookie = `form=${formName}`;
// console.log(smallFormsArr);