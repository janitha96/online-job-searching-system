<?php include_once 'header.php'; ?>
<div id="home">
  <div class="container" style="background-color: ;">
  <div class="row justify-content-center">
<div class="col-11 col-sm-12 col-md-10 col-lg-10" id="logSubHome">
			<h5 id="logInText">Log In</h5>
			<form action="includes/login.inc.php" method="POST">
				<div class="row row justify-content-center">
				<div class="col-11 col-sm-12 col-md-10 col-lg-6" style="background-color: ; border: 1px solid #c6cacc;"><br>
				<!-- <div class="container" style="background-color: red; border: 1px solid #c6cacc;"> -->
					
						<p id="logInTextFields">User Name</p>
						<input type="text" name="uname" class="form-control" id="logInTextBox">
						<p id="logInTextFields">Password</p>

						<input type="password" name="pwd" class="form-control" id="logInTextBox">
						
						<a href="#">Forgot my password.</a><br><br>
						<button type="submit" name="submit-login" class="btn btn-link" id="loginButton">Log In</button>
						<p>If you don not have an account please register <a href="signup.php">here</a></p>
						
						&nbsp;
				<!-- </div> -->
			</div>
		</div>
			</form>
		</div>
	</div>
	</div>
</div>
