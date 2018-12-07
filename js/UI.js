$(document).ready(function () {
	$('#main_content').load("includes/UI/loggedout.php #register", function (e) {

		$.getScript("js/login_reg.js", function() {
			alert("Script loaded and executed.");
			});

		// });

$('form').submit(function (event) {
	event.preventDefault();
	value = $('form').serialize();
	register(value)
/* 	alert(value); */
alert("someshit");
	//alert(register(value));
	return false;
});
/* $( "#removescript" ).click(function() {
	alert( "Handler for .click() called." );
  }); */

});
});

/* function removescript() {
	alert("tset");
	
} */



/* $.getScript("js/"+val+"-script.js", function() {
	alert("Script loaded and executed.");    
} */
/*
$(document).ready(function(){
	location.hash = "Register";
	$("#reg_form").on("submit", function (event) {
		event.preventDefault();
		var vars = $(this).serialize();
		console.log(vars);
		newMember(vars);
	});
 });
 
 function newMember(varstring) {
	console.log(varstring);
	$.post('functions/userfunctions.php?action=newUser&' + varstring, function (response) {
	   alert(response);
	});
 } */

 /* function register(value)
{
    $.post('register.php?action=regester&' + value, function (response) { 
        if (response == 1)
        {
			//detach previous scripts and pages then load rest
			//return 1;
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
    alert('i made it to the end bore i got it back')
}
 */