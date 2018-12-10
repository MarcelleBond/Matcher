$(document).ready(function () {
	if ((check = Ajax('user_status.php', 'POST', "", false)) == 0) {
		$('body').fadeOut('slow', function () {
			$('#nav').load("includes/UI/loggedout.php #nav_bar");
			$('#foot').load("includes/UI/loggedout.php #footer");

			$('#content').load("includes/UI/loggedout.php #register", function (e) {

				managescript('register.js', 'add');

				$('#login_link').click(function () {
					if (!document.getElementById('login'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #login", function () {
								managescript('login.js', 'add');
								managescript('register.js', 'remove');
							}).fadeIn('slow');
						});
				})

				$('#register_link').click(function () {

					if (!document.getElementById('register'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #register", function () {
								managescript('login.js', 'remove');
								managescript('register.js', 'add');
							}).fadeIn('slow');
						});
				})

			});
		}).fadeIn('slow');
	}
	else {
		$('body').fadeOut('slow', function () {

			$('#nav').load("includes/UI/loggedin.php #nav_bar", function(){
				managescript('logout.js', 'add');
			});

			$('#content').load("includes/UI/loggedin.php #main_content", function () {
				managescript('display_profile.js', 'add');
			});
		}).fadeIn('slow');

	}
});



function Ajax(sendto, method, value, AsyncOrSync) {
	request = "";
	request = $.ajax({
		url: sendto,
		type: method,
		data: value,
		async: AsyncOrSync,
	});
	return request.responseText;
}

function managescript(script, task) {
	if (task == 'remove')
		$("script[src='js/" + script + "']").remove();
	if (task == 'add')
		$.getScript("js/" + script);
}