<html>
	<head><title>LOGIN</title></head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<body>
<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

$page_title = 'Welcome to the Book Store!';

// Display the form:
?><h1>System Book Store</h1>
<form action="login.php" method="post">
	<h2>Login</h2>
	<?php 
	// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}
	?>
	<p><label>Email Address: </label><input type="text" name="email" size="20" maxlength="60" /> </p>
	<p><label>Password: </label><input type="password" name="pass" size="20" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="Login" /></p>
	<p><a class="active" href="register.php">Register</a></p>
	<p><a class="active" href="forgotpass.php">forgot password</a></p>
</form>
</body>
</html>
