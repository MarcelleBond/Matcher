$(document).ready( function () {
	$('#middle_content').fadeOut('slow', async function () {
		$('#middle_content').html(await profiles());
	}).fadeIn('slow');
});

	
	async function profiles() {
		people = await Ajax('home.php', 'POST', 'all=all', false)
		// console.log("PEOPLE: "+ people);
		return people
	}
	
	
	
	async function build_profile(name) {
		Ajax('notifications.php', 'POST', 'addnotes=viewed you page&name=' + name.innerHTML, true);
		$('#middle_content').fadeOut('slow', function () {
			$('#middle_content').load("includes/UI/loggedin.php #person_profile", async function () {
				person =  await Ajax('home.php', 'POST', 'profile=' + name.innerHTML, false);
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
function block () {
	person = $('#persons_username').html();
	blockstatus = $('#blockBtn').attr('data-blkstat');
	if (blockstatus == 'block')
	{
		check = Ajax('home.php','POST','block='+person,false);
		console.log(check);
		$('#blockbtn').attr('data-blkstat', 'unblock');
		$('#blockbtn').html('<i class="fa fa-remove"></i>Unblock');
		
	}
	else if (blockstatus == 'unblock')
	{
		check = Ajax('home.php','POST','unblock='+person,false);
		console.log(check);
		$('#blockbtn').attr('data-blkstat', 'unblock');
		$('#blockbtn').html('<i class="fa fa-remove"></i>Block');
	}
}