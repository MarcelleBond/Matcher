$(document).ready(function () {
	$('body').load("includes/UI/loggedout.php #register", function(e){
		$('form').submit(function () {
			value = $('form').serialize();
			$.post('register.php?action=regester&' + value, function (response) { 
				if (response == 1)
				{
					$('body').load("includes/UI/loggedout.php #login", function(){
						$('h2').after('<div class="w3-panel w3-green w3-center"><h3>Success!</h3><p>Please check your email to activate account </p></div> ');
					})
				}
				else
				{
					$('#errordiv').html('<h3>ERROR!</h3><p id="error"></p>')
					$('#error').html(response);
				}
			})
			return false;	
			
		});
	});
	
});