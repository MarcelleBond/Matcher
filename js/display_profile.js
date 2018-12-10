
details = Ajax('profile.php', 'POST', 'display_info=display_info', false);
details = JSON.parse(details);
profile = JSON.parse(details['profile']);
// images = Ajax('profile.php', 'POST', 'images=images', false)
// alert(imags);
// images = JSON.parse(images);



// $("#propic").attr('src', profile['profile_pic']);
$('#display_username').append(details.username);
$('#display_name').append(details.first_name + ' ' + details.last_name);
$('#display_gender').append(profile);
$('#display_dob').append(details.username);
// for (var i = 0; i < 5; i++)
	// $('#display_display_images').append('<div class="w3-half"><img src="'+images[i]+'" style="width:100%" class="w3-margin-bottom"></div>');
// for(var i = 0; i < profile.interest.length; i++)
	// $('#display_interst').append('<span class="w3-tag w3-small w3-theme-d5">'+profile[i]+'</span>');
