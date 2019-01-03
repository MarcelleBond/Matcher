
$('#ForgotButton').click(function (e) {
	e.preventDefault()
	$('#content').fadeOut('slow', function () {
		$('#content').load("includes/UI/loggedout.php #forgot_password").fadeIn('slow');
	});
	managescript('forgotpassword.js', 'add');
	managescript('login.js', 'remove');
})

$('form').submit(function (event) {
	event.preventDefault();
	value = $('form').serialize();
	check = login(value)
	if (check == 1) {
			managescript('UI.js', 'remove');
			managescript('UI.js', 'add');
			managescript('login.js', 'remove');
	}
	else {
		if (document.getElementById('error'))
			$('#error').html(check);
		else {
			$('h2').after('<div class="w3-panel w3-red w3-center"><h3>ERROR!</h3><p id="error"></p></div>');
			$('#error').html(check);
		}
	}
	return false;
});

function login(value) {
	request = Ajax('login.php', 'POST', value, false);
	return request;

}

