

$(document).ready(function () {
    $('.tags').select2({
        placeholder: "select your interests"
    });
    console.log($("#Uploadbtn"));    
    $("#Uploadbtn").click(function (e) {
        alert('hello');
        e.preventDefault();
        imageupload = document.getElementById("image");
        imageupload.click();
        imageupload.addEventListener('change', function () {
            if (imageupload.files && imageupload.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('img1').setAttribute('src', e.target.result);
                    document.getElementById('img1').style.display = "inline-block";
                };
                reader.readAsDataURL(imageupload.files[0]);
            }
        });

    });
});