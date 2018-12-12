
details = Ajax('profile.php', 'POST', 'action=display_info', false);
details = JSON.parse(details);
profile = JSON.parse(details['profile']);
//console.log(details['profile']);
// images = Ajax('profile.php', 'POST', 'images=images', false)
// alert(imags);
// images = JSON.parse(images);

if (!profile.dp)
{
		$('#middle_column').load("includes/UI/loggedin.php #preference", function()
		{
			managescript('pref.js', 'add')
		})
}

// $("#propic").attr('src', profile['profile_pic']);
$('#display_username').append(details.username);
$('#display_name').append(details.first_name + ' ' + details.last_name);
$('#display_gender').append(profile.gender);
$('#display_dob').append('September 11 1997');
// for (var i = 0; i < 5; i++)
	// $('#display_display_images').append('<div class="w3-half"><img src="'+images[i]+'" style="width:100%" class="w3-margin-bottom"></div>');
// for(var i = 0; i < profile.interest.length; i++)
	// $('#display_interst').append('<span class="w3-tag w3-small w3-theme-d5">'+profile[i]+'</span>');




	// SELECT * FROM users WHERE json_unquote(json_extract(`profile`, '$.Interests.food')) = "cats"


/* 
	/fetch only profile column
SELECT json_unquote(json_extract(`profile`, '$.friends')) as SELFRIENDS FROM users



"Nested":"[{"movies": "1", "food": "1", "Sports": "1",}]  ---ignore this line


//select nested key
SELECT json_unquote(json_extract(`profile`, '$.Interests.food')) FROM users



//notation and structure with nesting
{"friends": "none", "Profiletype": "NewProfile", "Interests": {"movies": "dogs", "food": "cats", "Sports": "cow tipping"}} */