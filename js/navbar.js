$('#home').click(function(){
	$('#middle_column').html('');
	if (window.location == '#update')
	{
		managescript('UI.js', 'remove');
		managescript('UI.js', 'add');
		managescript('navbar.js', 'remove');
	}
	else 
	{
		window.location
	}
})