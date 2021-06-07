<?php include_once 'header.php'; ?>

  <div class="container" style="background-color: red;">
  <div class="row justify-content-center">

		<div class="col-11 col-sm-12 col-md-10 col-lg-10" id="signSubHome"  style="background-color: ; border: 1px solid #c6cacc;">
			<h5 id="logInText">Register Account</h5><br>

			<form action="includes/signup.inc.php" method="POST">
				<div class="container">
					<div class="row row justify-content-center">
				
				<div class="col-11 col-sm-12 col-md-10 col-lg-6">
					
				<p id="signupTextFields">First Name</p>
				<input type="text" name="fname" class="form-control" id="logInTextBox">
				<p id="signupTextFields">Last Name</p>
				<input type="text" name="lname" class="form-control" id="logInTextBox">
				<p id="signupTextFields">Email</p>
				<input type="text" name="email" class="form-control" id="logInTextBox">
				<p id="signupTextFields">User Name</p>
				<input type="text" name="uname" class="form-control" id="logInTextBox">
				<p id="signupTextFields">Password</p>
				<input type="password" name="pwd" class="form-control" id="logInTextBox">
				<p id="signupTextFields">Repeat-Password</p>
				<input type="password" name="conPwd" class="form-control" id="logInTextBox">
				<br>
				
				<button type="submit" name="submit-signup" class="btn btn-link" id="loginButton">Sign Up</button>
		</div>
	</div>
</div>
			</form>
		</div>
	</div>
	</div>
