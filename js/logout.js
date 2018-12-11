$('#logout_link').click(function () {
	response = Ajax('logout.php', 'POST',null, false);
	if (response == 1) {
		managescript('UI.js', 'remove');
		managescript('UI.js', 'add');
	}
});