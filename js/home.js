$(document).ready(async function () {
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
			person = await Ajax('home.php', 'POST', 'profile=' + name.innerHTML, false);
			person = JSON.parse(person)
			data = person[0].profile;
			data = JSON.parse(data);
			// var status = $('#likeBtn').html();
			// status = status.substring(status.lastIndexOf(' ') + 1, status.length);
			me = person[0].liker_id == person[0].user_id ? 'likee' : 'liker';
			response = await Ajax('view_profile.php', 'POST', 'likecheck=likecheck&me=' + me + '&them=' + person[0].user_id, false)
			response = JSON.parse(response);
			console.log(response);
			// alert()
			if (response[0].liker_stat == 1 && response[0].liker_id == person[0].user_id && response[0].likee_stat == 0) {
				$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like Back");
			}
			else if(response[0].liker_stat == 1 && response[0].likee_stat == 1) {
				$('#likeBtn').html("<i class='fa fa-thumbs-down'></i> UnLike");
			}
			else{
				$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
			}
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

			$('#likeBtn').click(async function (e) {
				e.preventDefault();
				var status = $('#likeBtn').html();
				status = status.substring(status.lastIndexOf(' ') + 1, status.length);

				// var response = await Ajax('home.php', 'POST', 'likestatus=' + status + '&me=' + me + '&them=' + person[0].user_id, false)
				// response = JSON.parse(response);
				// alert()
				if (status == "UnLike") {
					if (Object.keys(response[0]) == 'likee_stat') {
						if (response[0].likee_stat == 1) {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like Back");
						}
						else {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
						}
					}
					else {
						if (response[0].liker_stat == 1) {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like Back");
						}
						else {
							$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
						}
					}
				}
				else {
					$('#likeBtn').html("<i class='fa fa-thumbs-down'></i> UnLike");
				}
			});
		});
	}).fadeIn('slow');

}



function block() {
	person = $('#persons_username').html();
	blockstatus = $('#blockBtn').attr('data-blkstat');
	check = Ajax('home.php', 'POST', 'block=' + person, true);
	loadpeople();
}

function report(params) {
	Ajax('view_profile.php', 'POST', "report=" + params, true);
}