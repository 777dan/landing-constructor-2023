//создание input для загрузки изображений для слайдера (карусель)
const addNewSlider_elements = document.getElementById("addNewSlider_elements");
addNewSlider_elements.addEventListener("click", addUploadingImgInput);
let uploadImgFormsArr = [];


function addUploadingImgInput() {
    const slider_elements = document.getElementById("slider_elements");
    const input2 = document.createElement("input");
    input2.type = 'file';
    let inputName = `uploadImgForm${uploadImgFormsArr.length + 1}`;
    uploadImgFormsArr.push(inputName);
    input2.name = inputName;
    input2.className = 'design light-green lighten-5'
    const br2 = document.createElement("br");
    
    slider_elements.appendChild(input2);
    slider_elements.appendChild(br2);
    document.cookie = `inputsForSliderLength=${uploadImgFormsArr.length}`;
}