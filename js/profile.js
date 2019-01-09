

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
    checkcheck();
    

    ///////////PREVIEW PROFILE/////////////



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
    ////////SUBMIT LAST NAME//////////
    $('#lastname_form').submit(function (event) {
        event.preventDefault();
        value = $('#lastname_form').serializeArray();
        Ajax('profile.php', 'POST', value, true);
        return false;
    });
    ////////SUBMIT FIRST NAME//////////
    $('#firstname_form').submit(function (event) {
        event.preventDefault();
        value = $('#firstname_form').serializeArray();
        Ajax('profile.php', 'POST', value, true);
        return false;
    });
    ////////SUBMIT interest//////////
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
    ////////UPDATE NOTIFICATIONS/////
    $('#chbx').click(function(event)
    {
        testfunc();
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
////////UPDATE PASSWORD//////////
function updPass() {
    var hr = new XMLHttpRequest();
    var url = "profile.php";

    curpass = document.getElementById("passwd_current").value;
    newpass = document.getElementById("passwd_new").value;
    newpassag = document.getElementById("passwd_new_again").value;
    var vars = "passwd_new=" + newpass + "&passwd_new_again=" + newpassag + "&passwd_current=" + curpass + "";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            $('error_spot').load("loggedin.php #response", function () {
                $("#response").html(return_data);
            });
            document.getElementById("passwd_current").value = "";
            document.getElementById("passwd_new").value = "";
            document.getElementById("passwd_new_again").value = "";

        }
    }
    hr.send(vars);
}

////////UPDATE EMAIL//////////

function updEmail() {
    var hr = new XMLHttpRequest();
    var url = "profile.php";

    curpass = document.getElementById("email_again").value;
    newpass = document.getElementById("email").value;
    var vars = "email=" + newpass + "&email_again=" + newpass;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("emailres").innerHTML = return_data;
            document.getElementById("email_again").value = "";
            document.getElementById("email").value = "";



        }
    }
    hr.send(vars);
}

////////UPDATE USERNAME//////////

function updUser() {
    var hr = new XMLHttpRequest();
    var url = "profile.php";

    curpass = document.getElementById("username").value;
    var vars = "username=" + curpass;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("userres").innerHTML = return_data;
            curpass = document.getElementById("username").value = "";

        }
    }
    hr.send(vars);
}

////////UPDATE NOTIFICATION//////////

function testfunc() {
    var box = document.getElementById("chbx");
    var xhr = new XMLHttpRequest();
    var url = "profile.php";
    if (box.checked) {
        var notify = 1;
    }
    else {
        var notify = 2;
    }
    var newvars = "notify=" + notify;
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            chkstat = xhr.responseText;
        }
    };
    xhr.send(newvars);
}


function checkcheck() {
    var box = document.getElementById("chbx");
    var xhr = new XMLHttpRequest();
    var url = "profile.php";
    var newvars = "mypostname=" + "testttt";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            chkstat = xhr.responseText;
            if (chkstat == 1) {
                box.checked = true;
            }
            else {
                box.checked = false;
            }

        }
    };
    xhr.send(newvars);

}


