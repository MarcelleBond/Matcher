$(document).ready(function () {
	$('#middle_content').fadeOut('slow', function () {
		$('#middle_content').html(profiles());
	}).fadeIn('slow');

});

function profiles() {
	people = Ajax('home.php', 'POST', 'all=all', false)
	return people
}


function build_profile(name) {

	Ajax('notifications.php', 'POST', 'addnotes=viewed you page&name=' + name.innerHTML, true);
	$('#middle_content').fadeOut('slow', function () {
		$('#middle_content').load("includes/UI/loggedin.php #person_profile", function () {
			person = Ajax('home.php', 'POST', 'profile=' + name.innerHTML, false);
			person = JSON.parse(person)
			data = person[0].profile;
			data = JSON.parse(data);

			$("#persons_dp").attr('src', data.dp);
			$('#last_seen').html(data.last_login);
			$('#persons_username').html(person[0].username);
			$('#persons_names').html(person[0].first_name + " " + person[0].last_name);
			$('#persons_location').html(data.location);
			$('#persons_age').html('Age: ' + Age(data.DOB));
			$('#persons_fame').html('Fame: ' + data.fame + " pts");
			$('#persons_birthday').html('Birthday: ' + data.DOB);
			$('#persons_bio').html(data.bio);
			for (const key in data.interest) {
				if (data.interest.hasOwnProperty(key)) {
					const element = data.interest[key];
					$('#persons_interests').append('<span class="w3-tag w3-medium w3-theme-l1" style="margin-top: 5px; margin-right: 5px">' + element + '</span>');
				}
			}
			for (let i = 0; i < person.length; i++) {
				const element = person[i].img_name;
				$('#persons_pics').append('<div class="w3-half"><img src="' + element + '" style="width:100%" alt="' + element + '" class="w3-margin-bottom"></div>');
			}
		});
	}).fadeIn('slow');


}