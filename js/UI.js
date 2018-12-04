$(document).ready(function () {
	$('body').load("includes/UI/loggedout.php #register", function (response, status, request) {
		if (status == "success") {

			$('#register').append('<input type="hidden" name="token" value="<?php  echo token::generate(); ?>">')
		}
		if (status == "error") {
			alert("Error: " + request.status + ": " + request.statusText)
		}

	});
});