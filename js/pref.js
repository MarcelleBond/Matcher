

$(document).ready(function () {
    $('.tags').select2({
        placeholder: "select your interests"
    });

    $("#Uploadbtn").click(function (e) {
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

    $('#pic_form').submit(function (event) {
        event.preventDefault()
        var pic = document.getElementById("image").files[0];


        var hr = new XMLHttpRequest();
        var url = "profile.php";
        var formData = new FormData();
        formData.append("image", pic);
        hr.open("POST", url, true);
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                if (return_data == 0) {
                    if (document.getElementById('error'))
                        $('#error').html(check);
                    else {
                        $('#Uploadbtn').before('<div class="w3-panel w3-red w3-center"><h3>ERROR!</h3><p id="error"> There was an error uploading you image</p></div>');
                        $('#error').html(check);
                    }
                } else {
                    if (document.getElementById('error'))
                        $('#error').html(check);
                    else {
                        $('#Uploadbtn').before('<div class="w3-panel w3-green w3-center"><h3>Success!</h3><p id="error">Image uploaded successfuly</p></div>');
                        $('#error').html(check);
                    }
                }
            }
        }
        hr.send(formData);
        return false;
    });

    $('#bio_form').submit(function (event) {
        event.preventDefault();
        value = $('#bio_form').serializeArray();
        console.log(value)

        check = Ajax('profile.php', 'POST', value, false);
        alert(check);
        return false;
    });
});


/* function update(params) {
    
} */