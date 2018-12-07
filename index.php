<?php
    require_once 'core/init.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Matcha</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery-3.3.1.min.js" ></script>
	<!-- <script src="js/login_reg.js"></script> -->
	<script src="js/UI.js"></script>
	<!-- <script src="js/chat.js"></script> -->
</head>
<body class="w3-theme-l5">

    <!-- Navbar -->
    <div id="navbig" class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i
                    class="fa fa-globe"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i
                    class="fa fa-user"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i
                    class="fa fa-envelope"></i></a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
                <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                    <a href="#" class="w3-bar-item w3-button">One new friend request</a>
                    <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
                    <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
                </div>
            </div>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
                <img src="images/site_images/logo.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
            </a>
        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navsmall" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
	</div>
	
	<div id="main_content">
		
	</div>

	<footer class="w3-container w3-theme-d3 w3-padding-16">
        <h5>&copymbond</h5>
    </footer>
</body>
</html>