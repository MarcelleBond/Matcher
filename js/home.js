$(document).ready(function () {
        people = Ajax('home.php', 'POST', 'all=all', false)
        $('#middle_content').fadeOut('slow', function () {
			$('#middle_content').html(people);
		}).fadeIn('slow');
        
});

