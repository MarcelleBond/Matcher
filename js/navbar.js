$('#home').click(function(){
	// $('#middle_column').html('');
	if (last_page() == 'profile')
	{
		managescript('profile', 'remove');
		managescript('UI.js', 'remove');
		managescript('UI.js', 'add');
		managescript('navbar.js', 'remove');
	}
	/* else 
	{
		
	} */

});

$('#profile').click(function ()
{
	$('#middle_content').fadeOut('slow',function(){
		$('#middle_content').load("includes/UI/loggedin.php #preference", function () {
		managescript(last_page(), 'remove');
		managescript('profile.js', 'add');
	});
		}).fadeIn('slow');
});
