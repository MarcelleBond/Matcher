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

async function sortNfilter(interests) {
	
	people = await Ajax('home.php', 'POST', 'sortNfilter=1&'+interests, false)
	// console.log("PEOPLE: "+ people);
	return people
}


async function build_profile(profile) {
	name = profile.innerHTML;
	managescript('view_profile.js', 'remove')
	managescript('view_profile.js', 'add')
}


