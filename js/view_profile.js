


	Ajax('notifications.php', 'POST', 'addnotes=viewed you page&name=' + name.innerHTML, true);
	$('#middle_content').fadeOut('slow', function () {
		$('#middle_content').load("includes/UI/loggedin.php #person_profile", function () {
			person = Ajax('view_profile.php', 'POST', 'profile=' + name.innerHTML, false);
			person = JSON.parse(person)
			data = person[0].profile;
			data = JSON.parse(data);
			console.log(person);

			$("#persons_dp").attr('src', data.dp);
			$('#last_seen').html(data.last_login);
			$('#persons_username').html(person[0].username);
			$('#persons_names').html(person[0].first_name + " " + person[0].last_name);
			$('#persons_location').html(data.location);
			$('#persons_age').html('Age: ' + Age(data.DOB));
			$('#persons_fame').html('Fame: ' + data.fame + " pts");
			$('#persons_bio').html(data.bio);
			if ((person[0].liker_id == person[0].user_id && person[0].liker_stat == 1 && person[0].likee_stat == 0) || (person[0].likee_id == person[0].user_id && person[0].likee_stat == 1 && person[0].liker_stat == 0)) {
				//like back
				$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like Back");
			}
			else if ((person[0].liker_id == person[0].user_id && person[0].liker_stat == 0 && person[0].likee_stat == 1) || (person[0].likee_id == person[0].user_id && person[0].likee_stat == 0 && person[0].liker_stat == 1)) {
				//unlike
				$('#likeBtn').html("<i class='fa fa-thumbs-down'></i> Unlike");
			}
			else {
				//like
				$('#likeBtn').html("<i class='fa fa-thumbs-up'></i> Like");
			}
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
			
			$('#likeBtn').click(function(e){
				e.preventDefault();
				var status = $('#likeBtn').html();
				status = status.substring(status.lastIndexOf(' ') + 1 , status.length);
				var me = person[0].liker_id == person[0].user_id ? 'likee' : 'liker';
				Ajax('view_profile.php', 'POST', 'all=all', true)				

			});
		});
	}).fadeIn('slow');



function block() {
	person = $('#persons_username').html();
	blockstatus = $('#blockBtn').attr('data-blkstat');
	if (blockstatus == 'block') {
		check = Ajax('view_profile.php', 'POST', 'block=' + person, false);
		console.log(check);
		$('#blockBtn').attr('data-blkstat', 'unblock');
		$('#blockBtn').html('<i class="fa fa-remove"></i>Unblock');

	}
	else if (blockstatus == 'unblock') {
		check = Ajax('view_profile.php', 'POST', 'unblock=' + person, false);
		console.log(check);
		$('#blockBtn').attr('data-blkstat', 'block');
		$('#blockBtn').html('<i class="fa fa-remove"></i>Block');
	}
}