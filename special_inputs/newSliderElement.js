//создание input для загрузки изображений для слайдера (карусель)
$(document).ready(function () {
    let sliderElementsArr = [];
    $("#newSliderElement").click(function () {
        sliderElementsArr.push(`sliderElement${sliderElementsArr.length + 1}`);
        document.cookie = `numberOfsliderElements=${sliderElementsArr.length}`;
        const sliderElement = $("<input/>");
        sliderElement.attr("type", "file");
        sliderElement.attr("name", `sliderElement${sliderElementsArr.length}`);
        sliderElement.attr("class", "design light-green lighten-5");
        $("#sliderElements").append(sliderElement);
        $("#sliderElements").append("<br/>");
        $("#sliderElements").append("<br/>");
    });
});