<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

<?php
	if (isset($_POST['submit'])) {

		$username = htmlspecialchars(trim($_POST['username']));
		$password = htmlspecialchars(trim($_POST['password']));


		if ($username AND $password) {
		
			if (strlen($username)>=4) {
				# code...
			}
			else {
				echo "Username too short !";
			}

			if (strlen($password)>=4) {
				# code...
			}
			else {
				echo "Password must contain 4 caracters minimum !";
			}
		}
		else {
			echo "Complete all fields";
		}

		$password = md5($password);

		mysql_connect('localhost', 'root', '');
		mysql_select_db('c8s');

		$query = mysql_query("INSERT INTO admins VALUES('','$username','$password')");

		die('Registration done : <a href="login.php">login<a>');
	}

	

?>
	<title>registration</title>
</head>
<body>

<h1>Register</h1>
	<form action="register.php" method="POST">
		<label>Username :</label>
		<input type="text" name="username" placeholder="Enter your username">
		<label>Password :</label>
		<input type="password" name="password" placeholder="Enter your password">
		<input type="submit" name="submit" value="Enter">
	</form>
	<br><br>
	<a href="login.php">I've already an account</a>
</body>
</html>