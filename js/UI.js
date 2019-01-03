$(document).ready(function () {
	if ((check = Ajax('user_status.php', 'POST', 'action=login', false)) == 0) {
		window.location.href = "#register"
		$('body').fadeOut('slow', function () {
			$('#nav').load("includes/UI/loggedout.php #nav_bar", function()
			{
				$('#login_link').click(function () {
					if (!document.getElementById('login'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #login", function () {
								managescript('login.js', 'add');
								managescript(last_page(), 'remove');
							}).fadeIn('slow');
						});
				})

				$('#register_link').click(function () {
					if (!document.getElementById('register'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #register", function () {
								managescript(last_page(), 'remove');
								managescript('register.js', 'add');
							}).fadeIn('slow');
						});
				})

				$('#login_link2').click(function () {
					if (!document.getElementById('login'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #login", function () {
								managescript('login.js', 'add');
								managescript(last_page(), 'remove');
							}).fadeIn('slow');
						});
				})

				$('#register_link2').click(function () {

					if (!document.getElementById('register'))
						$('#content').fadeOut('slow', function () {
							$('#content').load("includes/UI/loggedout.php #register", function () {
								managescript(last_page(), 'remove');
								managescript('register.js', 'add');
							}).fadeIn('slow');
						});
				})
			});
			$('#foot').load("includes/UI/loggedout.php #footer");

			$('#content').load("includes/UI/loggedout.php #register", function (e) {

				managescript('register.js', 'add');
			});
		}).fadeIn('slow');
	}
	else {
		$('body').fadeOut('slow', function () {
			$('#nav').load("includes/UI/loggedin.php #nav_bar", function () {
				managescript('logout.js', 'add');
			});
			$('#foot').load("includes/UI/loggedout.php #footer");
			$('#content').load("includes/UI/loggedin.php #main_content", function () {
				managescript('display_profile.js', 'add');
				if (Ajax('user_status.php', 'POST', "action=p.p", false) == 0) {
					$('#middle_column').load("includes/UI/loggedin.php #preference", function () {
						window.location.href = "#update";
						managescript('profile.js', 'add')
					})
				}
				else {
					window.location.href = "#home"
					managescript('navbar.js', 'add')
				}
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
	})
	return request.responseText;
}

function managescript(script, task) {
	if (task == 'remove')
		$("script[src='js/" + script + "']").remove();
	if (task == 'add')
		$.getScript("js/" + script);
}

function myFunction(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-theme-d1";
	} else {
		x.className = x.className.replace("w3-show", "");
		x.previousElementSibling.className =
			x.previousElementSibling.className.replace(" w3-theme-d1", "");
	}
}

function openNav() {
	var x = document.getElementById("navDemo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else {
		x.className = x.className.replace(" w3-show", "");
	}
} 


function last_page()
{
	place = window.location.href;
	place = place.split('#');
	return place[1];
}