$(document).ready(function () {
	loadchat();
	setInterval(function()
	{
		loadchat();
	}, 100);
	function loadchat()
	{
		$.post('message.php?action=getMessages', function(response)
		{
			var scrollpos = $('.chat-messages').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('.chat-messages').prop('scrollHeight');
			$('.chat-messages').html(response)
			if(scrollpos < scrollHeight)
			{}
			else
			{
				$('.chat-messages').scrollTop($('.chat-messages').prop('scrollHeight'));
			}
		});
	}

	$('.chat-textarea').keyup(function (e) {
		if (e.which == 13) {
			$('form').submit();
		}
	});

	$('form').submit(function () {
		var message = $('.chat-textarea').val();
		$.post('message.php?action=sendMessage&message=' + message, function (response) {
			loadchat();
			if (response == 1) {
				document.getElementById('messageform').reset();
			}
		});

		return false;
	})
});