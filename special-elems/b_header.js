$(document).ready(function () {
    const header_background = $("<input/>");
    let b_color = header_background;
        b_color.attr("type", "color");
        b_color.attr("name", "b_color");
        b_color.attr("id", "b_color");
        b_color.attr("value", "#FFFFFF");
        $("#b_set").append(b_color);
    $("#b_Settings").change(function () {
        if ($("#b_Settings").val() === "b_image") {
            if ($("#b_color") !== null) {
                $("#b_color").remove();
            }
            let b_image = header_background;
            b_image.attr("type", "file");
            b_image.attr("name", "b_image");
            b_image.attr("id", "b_image");
            $("#b_set").append(b_image);
        }
        if ($("#b_Settings").val() === "b_color") {
            if ($("#b_image") !== null) {
                $("#b_image").remove();
            }
            $("#b_set").append(b_color);
        }
    });
});