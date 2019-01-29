
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
$('#display_loca').append(profile.location);
$('#bio_text').html(profile.bio);
for (var i = 0; i < images.length; i++)
	$('#display_images').append('<div class="w3-half"><img src="' + images[i]['img_name'] + '" style="max-width:100%" class="w3-margin-bottom"></div>');
for (const key in profile.interest) {
	if (profile.interest.hasOwnProperty(key)) {
		const element = profile.interest[key];
		$('#display_interest').append('<span class="w3-tag w3-small w3-theme-l1 w3-margin-right-16">' + element + '</span>  ');
	}
}