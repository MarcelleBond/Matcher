function register(value)
{
   var postreq =  $.post('register.php?action=regester&' + value, function (response) { 
        if (response == 1)
        {
            $('body').load("includes/UI/loggedout.php #login", function () {
                $('h2').after('<div class="w3-panel w3-green w3-center"><h3>Success!</h3><p>Please check your email to activate account </p></div>');
            })
        }
        else
        {
            $('#errordiv').html('<h3>ERROR!</h3><p id="error"></p>')
            $('#error').html(response);
        }
    })
 /*    .done(function() {
        alert('i made it to the end bore i got it back')
      }) */
   
}





/*     
function ajax_post(){
    var hr = new XMLHttpRequest();
    
    var url = "functions/login2.php";
    var fn = document.getElementById("uname").value;
    var ln = document.getElementById("pwrd").value;
    var vars = "uname="+fn+"&pwrd="+ln;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
            alert(return_data);
           checkResponse(hr.responseText);
            
	    }
    }
    hr.send(vars);
    document.getElementById("login_error").innerHTML = "logging in...<br><img class='w3-spin' src='img/loa.png'>";
} */