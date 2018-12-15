

$(document).ready(function () {
    $('.tags').select2({
        placeholder: "select your interests"
    });

    ////////DISPLAY CURRENT INFO//////////
    details = Ajax('profile.php', 'POST', 'action=display_info', false);
    details = JSON.parse(details);
    profile = JSON.parse(details['profile']);
    $('#bio-textarea').val(profile.bio);
    for (const key in profile.interest) {
        if (profile.interest.hasOwnProperty(key)) {
            const element = profile.interest[key];
            $('#interest_select').find('option[value="' + element + '"]').prop('selected', true);
        }
    }
    $('input:radio[id="' + profile.preference.toLowerCase() + '"]').attr('checked', true);
    display_pics();


    ////////DISPLAY UPLODED IMAGE//////////
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
    ////////SUBMIT UPLODED IMAGE///////////
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
                        $('#error').html('There was an error uploading you image');
                    else {
                        $('#Uploadbtn').before('<div class="w3-panel w3-blue w3-center"><h3>IMAGE</h3><p id="error"> There was an error uploading you image</p></div>');
                    }
                }
                else if (return_data == 2) {
                    if (document.getElementById('error'))
                        $('#error').html('You have reached you image upload limit.');
                    else {
                        $('#Uploadbtn').before('<div class="w3-panel w3-blue w3-center"><h3>IMAGE</h3><p id="error">You have reached you image upload limit.<br>Please delete an image to uploade more</p></div>');
                    }
                }
                else {
                    display_pics();
                    document.getElementById('img1').setAttribute('src', 'images/site_images/p_placeholder.jpeg');
                    if (document.getElementById('error'))
                        $('#error').html('Image uploaded successfuly');
                    else {
                        $('#Uploadbtn').before('<div class="w3-panel w3-blue w3-center"><h3>IMAGE</h3><p id="error">Image uploaded successfuly</p></div>');
                    }
                }
            }
        }
        hr.send(formData);
        document.getElementById('pic_form').reset();
        return false;
    });
    ////////SUBMIT BIO//////////
    $('#bio_form').submit(function (event) {
        event.preventDefault();
        value = $('#bio_form').serializeArray();
        Ajax('profile.php', 'POST', value, true);
        return false;
    });
    ////////SUBMIT BIO//////////
    $('#inter_form').submit(function (e) {
        e.preventDefault();
        value = $('#inter_form').serializeArray();
        check = Ajax('profile.php', "POST", value, true)
    });
    ////////UPDATE PREFERECNE//////////
    $('#prefernce_form').submit(function (event) {
        event.preventDefault();
        value = $('#prefernce_form').serializeArray();
        check = Ajax('profile.php', 'POST', value, true);
        return false;
    });
    ////////UPDATE PROFILE PICTURE//////////
    $('#set_propic').click(function () {
        value = $("#img01").attr('src');
        n = value.indexOf("images");
        value = value.substring(n);
        Ajax('profile.php', 'POST', 'new_propic=' + value, true);
        $('#propic').attr('src', value);
    });
    ////////DELETE PICTURES//////////
    $('#delete_pic').click(function()
    {
        value = $("#img01").attr('src');
        n = value.indexOf("images");
        value = value.substring(n);
        check = Ajax('profile.php', 'POST', 'delete_pic=' + value, true);
        if ($('#propic').attr('src')) {
            $('#propic').attr('src', 'images/site_images/p_placeholder.jpeg');
        }
        closeimage();
        display_pics()
    })

});


function display_pics() {
    images = Ajax('profile.php', 'POST', 'images=images', false)
    images = JSON.parse(images);
    $('#upload_preview').empty();
    for (var i = 0; i < images.length; i++)
        $('#upload_preview').append('<div class="w3-col" style="width:20%"><img onclick="onClick(this)" src="' + images[i]['img_name'] + '" style="width:120px; height:120px;" class="w3-margin-bottom"></div>');
}


function onClick(element) {
    $("#img01").attr('src', element.src);
    $("#modal01").show();

}

function closeimage() {
    $("#modal01").hide();
}

