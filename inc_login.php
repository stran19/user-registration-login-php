<?php // Script 8.9 - login.php
/* This page lets people login for the site (in theory). */

function checkLogin($email, $password) {
  if ($email == "user@user.com" && $password == "12345") {
    print "<p class='text--success'>You are now logged in. Okay, you are not really logged in but...</p>";
  } else {
    print "<p class='text--error'>Incorrect email and/or password. Try again!</p>";
  }
}

// Print some introductory text:
print '<h2>Login</h2>
	<p>Register so that you can take advantage of certain features like this, that, and the other thing.</p>';
	
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$problem = false; // No problems so far.
	
	// Check for each value...

	if (empty($_POST['email'])) {
		$problem = true;
		print '<p class="text--error">Please enter your email address!</p>';
	}

	if (empty($_POST['password'])) {
		$problem = true;
		print '<p class="text--error">Please enter a password!</p>';
	}

	
	if (!$problem) { // If there weren't any problems...


    checkLogin($_POST['email'], $_POST['password']);

   

		// Clear the posted values:
		$_POST = [];
	
	} else { // Forgot a field.
	
		print '<p class="text--error">Please try again!</p>';
		
	}

} // End of handle form IF.

// Create the form:
?>
<form action="login.php" method="post" class="form--inline">

	<p ><label for="email">Email Address:</label><input type="email" name="email" size="20" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>"></p>

	<p ><label for="password">Password:</label><input type="password" name="password" size="20" value="<?php if (isset($_POST['password'])) { print htmlspecialchars($_POST['password']); } ?>"></p>


	<p ><input type="submit" id = "submit" name="submit" value="Login" class="button--pill"></p>

</form>