$(document).ready(function () {
        $('#middle_content').fadeOut('slow', function () {
                        // $('#middle_content').html(profiles());
		}).fadeIn('slow');
        
});

function profiles(){
        people = Ajax('home.php', 'POST', 'all=all', false)
        return people
}