$(document).ready(function () {
	// LoadChat();
	/* setInterval(function () {
		LoadChat();
	}, 10000); */
	/* function LoadChat() {
		$.post('message.php?action=getMessages', function (response) {

			var scrollpos = $('#chat').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('#chat').prop('scrollHeight');
			$('#chat').html(response);
			if (scrollpos < scrollHeight) {

			} else {
				$('#chat').scrollTop($('#chat').prop('scrollHeight'));
			}
		});
	} */

	$('#textarea').keyup(function (e) {
		if (e.which == 13) {
			$('form').submit();
		}
	});

	$('form').submit(function () {
		var message = $('#textarea').val();
		$.post('message.php?action=sendMessage&message=' + message, function (response) {
			alert(response);
			if (response == 1) {
				LoadChat();
				$('#messageFrm')[0].reset();
			}
		});
		return false;
	});

});