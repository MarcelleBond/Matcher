<!--//////////////////////////////////////////// REGISTER FORM /////////////////////////////////////////////-->

<div id="register">
<form  class="w3-container w3-card-4 w3-display-middle w3-light-grey w3-text-black w3-margin" style="width:60%">
	<h2 class="w3-center">REGISTER</h2>

	<div id="errordiv" class="w3-panel w3-red w3-center"></div>
	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="username" type="text" placeholder="Username" required>
		</div>
	</div>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="first_name" type="text" placeholder="First Name" required>
		</div>
	</div>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="last_name" type="text" placeholder="Last Name" required>
		</div>
	</div>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="email" type="text" placeholder="example@host.com" required>
		</div>
	</div>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="passwd" type="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
			 title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		</div>
	</div>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="passwd_again" type="password" placeholder="Password again" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
			 title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		</div>
	</div>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-male"></i></div>
		<div class="w3-rest">
			<input id="male" class="w3-radio" type="radio" name="gender" value="male"> MALE
		</div>
	</div>
	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-female"></i></div>
		<div class="w3-rest">
			<input id="female" class="w3-radio" type="radio" name="gender" value="female"> FEMALE
		</div>
	</div>
	
	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-transgender-alt"></i></div>
		<div class="w3-rest">
			<input id="transgender" class="w3-radio" type="radio" name="gender" value="transgender"> TRANSGENDER
		</div>
	</div>
	
	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-genderless"></i></div>
		<div class="w3-rest">
			<input id="genderless" class="w3-radio" type="radio" name="gender" value="genderless" checked> GENDERLESS
		</div>
	</div>
	<p class="w3-center">
		<button id="RegButton" class="w3-button w3-section w3-black w3-ripple"> REGISTER </button>
		
	</p>
</form>
<p><button id="removescript" class="w3-button w3-section w3-black w3-ripple" onclick="removescript()"> remove script </button></p>
</div>


<!--//////////////////////////////////////////// LOGIN FORM /////////////////////////////////////////////-->



<form id="login" class="w3-container w3-card-4 w3-display-middle w3-light-grey w3-text-black w3-margin" style="width:60%">
	<h2 class="w3-center">LOGIN</h2>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="username" type="text" placeholder="Username" required>
		</div>
	</div>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="passwd" type="password" placeholder="password" required>
		</div>
	</div>

	<p class="w3-center">
		<button id="LoginButton" class="w3-button  w3-black w3-ripple"> LOGIN </button>
	</p>
	<p class="w3-center">
		<button id="ForgotButton" class="w3-button w3-black w3-ripple"> Forgot password </button>
	</p>
</form>

<!--//////////////////////////////////////////// FORGOT PASSWORD FORM /////////////////////////////////////////////-->


<form id="forgot_password" class="w3-container w3-card-4 w3-display-middle w3-light-grey w3-text-black w3-margin" style="width:60%">
	<h2 class="w3-center">FORGOT PASSWORD</h2>

	<div class="w3-row w3-section">
		<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
		<div class="w3-rest">
			<input class="w3-input w3-border" name="email" type="email" placeholder="example@host.com" required>
		</div>
	</div>

	<p class="w3-center">
		<button id="SendButton" class="w3-button w3-section w3-black w3-ripple"> Send </button>
	</p>
</form>