//создание input для создания ссылок
const addNewLink = document.getElementById("addNewLink");
addNewLink.addEventListener("click", addLinkInput);
let linkInputs = [];
let hrefInputs = [];


function addLinkInput() {
    const links = document.getElementById("links");
    const input3 = document.createElement("input");
    const input4 = document.createElement("input");
    input3.type = 'input';
    input4.type = 'input';
    let linkName = `linkName${linkInputs.length + 1}`;
    linkInputs.push(linkName);
    let hrefName = `hrefName${hrefInputs.length + 1}`;
    hrefInputs.push(hrefName);
    input3.name = linkName;
    input4.name = hrefName;
    input3.placeholder = "Название ссылки";
    input4.placeholder = "Ссылка";
    input3.className = 'design light-green lighten-5'
    input4.className = 'design light-green lighten-5'
    const br3 = document.createElement("br");
    
    links.appendChild(input3);
    links.appendChild(input4);
    links.appendChild(br3);
    document.cookie = `inputsForLinksLength=${linkInputs.length}`;
}