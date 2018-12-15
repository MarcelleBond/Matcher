
details = Ajax('profile.php', 'POST', 'action=display_info', false);
details = JSON.parse(details);
profile = JSON.parse(details['profile']);
images = Ajax('profile.php', 'POST', 'images=images', false)
images = JSON.parse(images);

$("#propic").attr('src', profile.dp);
$('#display_username').append(details.username);
$('#display_name').append(details.first_name + ' ' + details.last_name);
$('#display_gender').append(profile.gender);
$('#display_dob').append(profile.DOB);
$('#bio_text').html(profile.bio);
for (var i = 0; i < images.length; i++)
	$('#display_images').append('<div class="w3-half"><img src="' + images[i]['img_name'] + '" style="width:100%" class="w3-margin-bottom"></div>');
for (const key in profile.interest) {
	if (profile.interest.hasOwnProperty(key)) {
		const element = profile.interest[key];
		$('#display_interest').append('<span class="w3-tag w3-small w3-theme-l1 w3-margin-right-16">' + element + '</span>  ');
	}
}





	// SELECT * FROM users WHERE json_unquote(json_extract(`profile`, '$.Interests.food')) = "cats"


/* 
	/fetch only profile column
SELECT json_unquote(json_extract(`profile`, '$.friends')) as SELFRIENDS FROM users



"Nested":"[{"movies": "1", "food": "1", "Sports": "1",}]  ---ignore this line


//select nested key
SELECT json_unquote(json_extract(`profile`, '$.Interests.food')) FROM users



//notation and structure with nesting
{"friends": "none", "Profiletype": "NewProfile", "Interests": {"movies": "dogs", "food": "cats", "Sports": "cow tipping"}} */