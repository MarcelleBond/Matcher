$('#home').click(function () {
	if (last_page() == 'profile') {
		managescript('profile.js', 'remove');
		managescript('UI.js', 'remove');
		managescript('UI.js', 'add');
		managescript('navbar.js', 'remove');
	} /* else if(last_page() == 'home') {} */
	else {
		managescript(last_page(), 'remove');
		managescript('home.js', 'add');
	}

});

$('#profile').click(function () {
	// if(last_page() != 'profile')
	// {	
		$('#middle_content').fadeOut('slow', function () {
			$('#middle_content').load("includes/UI/loggedin.php #preference", function () {
				managescript(last_page(), 'remove');
				managescript('profile.js', 'add');
			});
		}).fadeIn('slow');
	// }
});

$('#Notifications_icon').hover(function () {
	// over
	notes = Ajax('notifications.php', 'POST', 'getnotes=getnotes', false);
/* 	var result = Object.keys(notes).map(function(key) {
  return [Number(key), notes[key]];
}); */

//console.log(notes[0]));
	if (notes && notes != "0") {
		//checknotes();
		notes = JSON.parse(notes);
console.log(notes);
console.log("count");
		$("#Notifications p").remove();
/* 		for (i = 0; i < notes.length; i++) {
			$('#Notifications').append('<p class="w3-bar-item w3-button">' + notes[i] + '</p>');
		} */

		//new for loop: 

		//map object keys
		var result = Object.keys(notes).map(function(key) {
			return [Number(key), notes[key]];
		  });
		  console.log(result);
		  //load results
		  for (i = 0; i < result.length; i++) {
			$('#Notifications').append('<p class="w3-bar-item w3-button">' + result[i] + '</p>');
		}
	}

});

$('#NotificationsBtn').click(function()
{
	Ajax('notifications.php', 'POST', 'removenotes=removenotes', true);
	$("#Notifications p").remove();
})

$('#logout_link').click(function () {
	response = Ajax('logout.php', 'POST', null, false);
	if (response == 1) {
		managescript(last_page(), 'remove');
		managescript('UI.js', 'remove');
		managescript('UI.js', 'add');
		managescript('navbar.js', "remove");
	}
});