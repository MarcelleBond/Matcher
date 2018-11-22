<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/chat.css" />
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	 crossorigin="anonymous"></script> 
	<script src="js/chat.js"></script>

</head>
<body>
	<div class="chat">
		<input class="chat-name" type="text" name="" id="" placeholder="Enter you name">
		<div class="chat-messages"></div>
		<form method="post" id="messageform">
			<textarea class="chat-textarea" name="nessage" cols="30" rows="3" placeholder="Enter your message"></textarea>
		</form>
		<div class="chat-status">
			Status: <span>Idle</span>
		</div>
	</div>
</body>

</html>