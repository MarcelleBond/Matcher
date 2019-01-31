<!--///////////////////////////////////////////// NAV BAR /////////////////////////////////////////////-->

<div id="nav_bar">
	<div class="w3-top">
		<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
				href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
			<a href="#home" id="home" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
			<a href="#profile" id="profile" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"
				title="Account Settings"><i class="fa fa-user"></i></a>
			<a href="#stats" id='stats' class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"
				title="stats"><i class="fa fa-bar-chart"></i></a>
			<div class="w3-dropdown-hover w3-hide-small">
				<button id="Notifications_icon" class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span
						id='notes_count' class="w3-badge w3-right w3-small w3-green">0</span></button>
				<div id="Notifications" class="w3-dropdown-content w3-card-4 w3-bar-block" style="max-width:300px; max-hight:500px; overflow:auto">
					<button style="width:100%" id="NotificationsBtn" class="w3-button w3-padding-large" title="Clear Notifications">Clear</button>
				</div>

			</div>
			<a id="logout_link" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white"
				title="Logout">
				Logout
			</a>
		</div>
	</div>

	<!-- Navbar on small screens -->
	<div id="navDemo" style="max-width:1400px;margin-top:50px" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
		<a href="#profile" id="profile2" onclick="document.getElementById('profile').click()" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-user"></i>
			Profile</a>
		<a href="#stats" onclick="document.getElementById('stats').click()" id='stats2' class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-bar-chart"></i> Stats</a>
		<a id="logout_link2" onclick="document.getElementById('logout_link').click()" class="w3-bar-item w3-button w3-padding-large">Logout</a>
	</div>
</div>

<!--///////////////////////////////////////////// HOME PAGE /////////////////////////////////////////////-->


<!-- Page Container -->
<div id='main_content' class="w3-container w3-content" style="max-width:1400px;margin-top:80px; margin-bottom: 80px">
	<!-- The Grid -->
	<div class="w3-row">
		<!-- Left Column -->
		<div id="left_column" class="w3-col m3">
			<!-- Profile -->
			<div class="w3-card w3-round w3-white">
				<div class="w3-container">
					<h4 id="display_username" class="w3-center"></h4>
					<p class="w3-center"><img id="propic" src="images/site_images/p_placeholder.jpeg" class="w3-circle"
							style="height:106px;width:106px" alt="Avatar"></p>
					<hr>
					<p id="display_name"><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i></p>
					<p id="display_dob"><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i></p>
					<p id="display_loca"><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i></p>
					<p id="display_gender"><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i></p>
				</div>
			</div>
			<br>

			<!-- Accordion -->
			<div class="w3-card w3-round">
				<div class="w3-white">
					<button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>
						My Bio</button>
					<div id="Demo1" class="w3-hide w3-container">
						<p id="bio_text">Some text..</p>
					</div>
					<button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>
						My Photos</button>
					<div id="Demo3" class="w3-hide w3-container">
						<div id="display_images" class="w3-row-padding" style="amx-width: 100%">
							<br>
						</div>
					</div>
					<button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>
						My Friends</button>
					<div id="Demo2" class="w3-hide w3-container">
						<p>Some other text..</p>
					</div>
				</div>
			</div>
			<br>

			<!-- Interests -->
			<div class="w3-card w3-round w3-white w3-hide-small">
				<div class="w3-container">
					<p>Interests</p>
					<p id="display_interest">
					</p>
				</div>
			</div>
			<br>

			<!-- Alert Box -->
			<div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
				<span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
					<i class="fa fa-remove"></i>
				</span>
				<p><strong>Hey!</strong></p>
				<p>People are looking at your profile. Find out who.</p>
			</div>

			<!-- End Left Column -->
		</div>

		<!-- Middle Column -->
		<div id="middle_column" class="w3-col m7">
			<div id="search_bar" class="w3-row-padding w3-margin-bottom">
				<div class="w3-col m12">
					<div class="w3-card w3-round w3-white">
						<div class="w3-container w3-padding">
							<h6 class="w3-opacity">Search for user</h6>
							<p contenteditable="true" class="w3-border w3-padding"></p>
							<button type="button" class="w3-button w3-theme"><i class="fa fa-search"></i>  Search</button>
						</div>
					</div>
				</div>
			</div>
			<div id="middle_content">
			</div>
		</div>

		<!-- Right Column -->
		<div id="right_column" class="w3-col m2">
			<div class="w3-card w3-round w3-white w3-center">
				<div class="w3-container">
					<p>Upcoming Events:</p>
					<p><strong>Holiday</strong></p>
					<p>Friday 15:00</p>
					<p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
					<!-- <input type="range" min="1" max="100" value="50" class="slider" id="myRange" style="width: 100%"> -->
				</div>
			</div>
			<br>

			<div class="w3-card w3-round w3-white w3-center">
				<div class="w3-container">
					<p>Friend Request</p>
					<img id="requsters_img" src="" alt="requesters image" style="width:50%"><br>
					<span id="requsters_id">requesters name</span>
					<div class="w3-row w3-opacity">
						<div class="w3-half">
							<button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
						</div>
						<div class="w3-half">
							<button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
						</div>
					</div>
				</div>
			</div>
			<br>

			<div class=" w3-card w3-round w3-white w3-padding-16 w3-center">
				<p>ADS</p>
			</div>
			<br>

			<div class="w3-card w3-round w3-white w3-padding-32 w3-center">
				<p><i class="fa fa-bug w3-xxlarge"></i></p>
			</div>

			<div id='error_spot' class=" ">
			</div>
			<!-- End Right Column -->
		</div>

		<!-- End Grid -->
	</div>

	<!-- End Page Container -->
</div>


<!-- ////////////////////////////////////////////////////////////////// PERSONAL INFO ////////////////////////////////////////////////// -->

<div id="preference" class="w3-container w3-content" style="max-width:100%;">

	<div id="modal01" class="w3-modal " style="padding-top:0">
		<span class="w3-button w3-red w3-xlarge w3-display-topright" onclick="closeimage()">×</span>
		<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
			<button id="set_propic" class="w3-button w3-section w3-green w3-ripple">SET AS PROFILE PICTURE</button>
			<button id="delete_pic" class="w3-button w3-section w3-red w3-ripple">DELETE</button><br>
			<img id="img01" class="w3-image">
		</div>
	</div>
	<form id='pic_form' class="w3-container w3-card-4 w3-light-grey w3-text-black ">
		<h2 class="w3-center">PROFILE</h2>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"></div>
			<div class="w3-rest">
				<p class="w3-center">
					<input type="file" id="image" name="dp" style="display:none;">
					<br><br>Preview<br>
					<img class="uploaded_image" src="images/site_images/p_placeholder.jpeg" height='100px' width='100px'
						id="img1" name="uploaded_image"><br>
					<button id="Uploadbtn" class="w3-button w3-section w3-black w3-ripple">Upload</button>
					<div id='upload_preview' class="w3-row-padding"></div><br>
				</p>

			</div>
		</div>
		<p class="w3-center">
			<button id="picButton" class="w3-button w3-section w3-black w3-ripple"> Submit </button>

		</p>
	</form>
	<form id='firstname_form' class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">FIRST NAME</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input id="first_name" class="w3-input w3-border" name="first_name" type="text" placeholder="First Name"
					required>
			</div>
		</div>
		<p class="w3-center">
			<button id="firstnameButton" class="w3-button w3-section w3-black w3-ripple"> Submit </button>

		</p>
	</form>
	<form id='lastname_form' class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">LAST NAME</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input id="last_tname" class="w3-input w3-border" name="last_name" type="text" placeholder="Last Name"
					required>
			</div>
		</div>
		<p class="w3-center">
			<button id="lastnameButton" class="w3-button w3-section w3-black w3-ripple"> Submit </button>

		</p>
	</form>
	<form id='DOB_form' class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">BIRTHDAY</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>
			<div class="w3-rest">
			<input class="w3-input w3-border" type='date' name='age' id="age" max="2002-01-01" min="1940-01-01"  required>
			</div>
		</div>
		<p class="w3-center">
			<button id="DOBButton" class="w3-button w3-section w3-black w3-ripple"> Submit </button>

		</p>
	</form>
	<div class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">USERNAME</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" id="username" type="text" name="username" placeholder="New Username">
			</div>
		</div>
		<p class="w3-center">
			<button class="w3-button w3-section w3-black w3-ripple" id="passupdate" type="submit" onclick="updUser();"
				value="Update"> Submit</button><br>
		</p>
	</div>
	<div class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">EMAIL</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" type="email" id="email" name="email" placeholder="New Email"><br>
				<input class="w3-input w3-border" type="email" id="email_again" name="email_again" placeholder="Confirm New Email">
			</div>
		</div>
		<p class="w3-center">
			<button class="w3-button w3-section w3-black w3-ripple" id="passupdate" type="submit" onclick="updEmail();"
				value="Update"> Submit</button><br>
		</p>
	</div>
	<div class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">PASSWORD</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
			<div class="w3-rest">
				<input class="w3-input w3-border" type="password" name="passwd_current" id="passwd_current" placeholder="current password">
				<br>
				<input class="w3-input w3-border" type="password" name="passwd_new" id="passwd_new" placeholder="new password">
				<br>
				<input class="w3-input w3-border" type="password" name="passwd_new_again" id="passwd_new_again"
					placeholder="repeat new password">
				<br>
			</div>
		</div>
		<p class="w3-center">
			<button class="w3-button w3-section w3-black w3-ripple" id="passupdate" type="submit" onclick="updPass();"
				value="Update"> Submit</button><br>
		</p>
	</div>
	<div class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">RECEIVE NOTIFICATIONS</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge"></i></div>
			<div class="w3-rest">
				<label class="container">
					<input type='checkbox' id='chbx' name='chbx'>
					<span class="checkmark"></span>Notify
				</label>
			</div>
		</div>
	</div>
	<form id='bio_form' class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">BIO</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
			<div class="w3-rest">
				<input id="bio-textarea" class="w3-input w3-border" name="bio" type="text" placeholder="Bio" required>
			</div>
		</div>
		<p class="w3-center">
			<button id="bioButton" class="w3-button w3-section w3-black w3-ripple"> Submit </button>

		</p>
	</form>
	<form id="inter_form" class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">INTEREST</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-hand-pointer-o"></i></div>
			<div class="w3-rest">
				<select id="interest_select" class="tags" name="tags[]" multiple style="width: 100%">
					<option value="GAMING">GAMING</option>
					<option value="DANCING">DANCING</option>
					<option value="ART">ART</option>
					<option value="PHOTOGRAPHY">PHOTOGRAPHY</option>
					<option value="GETING STONED">GETING STONED</option>
					<option value="READING">READING</option>
					<option value="CODING">CODING</option>
					<option value="FOOD">FOOD</option>
					<option value="SPORTS">SPORTS</option>
					<option value="FRIENDS">FRIENDS</option>
				</select>
			</div>
		</div>
		<p class="w3-center">
			<button id="interButton" class="w3-button w3-section w3-black w3-ripple"> Submit </button>

		</p>
	</form>
	<form id="prefernce_form" class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin-top">
		<h4 class="w3-center">PREFERENCE</h4>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-male"></i></div>
			<div class="w3-rest">
				<input id="male" class="w3-radio" type="radio" name="pref" value="Male"> MALE
			</div>
		</div>
		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-female"></i></div>
			<div class="w3-rest">
				<input id="female" class="w3-radio" type="radio" name="pref" value="Female"> FEMALE
			</div>
		</div>

		<div class="w3-row w3-section">
			<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-genderless"></i></div>
			<div class="w3-rest">
				<input id="bi-sexual" class="w3-radio" type="radio" name="pref" value="BI-SEXUAL" checked>
				BI-SEXUAL
			</div>
		</div>
		<p class="w3-center">
			<button id="prefButton" class="w3-button w3-section w3-black w3-ripple"> Submit </button>

		</p>
	</form>
</div>


<!-- ////////////////////////////////////////////////////////////////// PERSONS PROFILE ////////////////////////////////////////////////// -->


<div id="person_profile" class="w3-container w3-card w3-white w3-round w3-margin">
	<br>
	<img id="persons_dp" src="https://i.ytimg.com/vi/ktlQrO2Sifg/maxresdefault.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right"
		style="width:60px; height:60px">
	<span id="last_seen" class="w3-right w3-opacity"></span>
	<h4 id="persons_username"></h4><br>
	<div class="w3-container w3-right ">
		<h4 id="persons_location"></h4>
		<h5 id="persons_fame"></h5>
		<button id="blockBtn" type="button" class="w3-button w3-theme-d1" onclick="block();" data-blkstat="block"><i class="fa fa-remove"></i>
		 Block</button>
	</div>
	<h4 id="persons_names"></h4>
	<h5 id="persons_age"></h5>
	<button id="likeBtn" type="button" class="w3-button w3-theme-d1 "><i class="fa fa-thumbs-up"></i>
		 Like</button>

	<hr class="w3-clear">
	<h4>BIO</h4>
	<p id="persons_bio"></p>
	<hr class="w3-clear">
	<h4>Interests</h4>
	<p id='persons_interests'>

	</p>
	<hr class="w3-clear">
	<h4>Images</h4>
	<div id="persons_pics" class="w3-row-padding" style="margin:0 -16px">
	   
	</div>