<?php

include_once 'function.php'; 


session_start();

	if (isset($_POST['submit'])) {
		
		$username = htmlspecialchars(trim($_POST['username']));
		$password = htmlspecialchars(trim($_POST['password']));

		if (empty($username)) {
			echo "Enter your username</br>";
		}
		else if (empty($password)) {
			echo "Enter your password";
		}
		else {

			mysql_connect('localhost','root','');
			mysql_select_db('c8s');

			$password = md5($password);

			$login = mysql_query("SELECT * FROM admins WHERE username = '$username' AND password = '$password'");

			$rows = mysql_num_rows($login);

			if ($rows == 1) {
				session_start(); 
				$_SESSION['username'] = $username;

				header('Location:index.php');
			}
			else {
				echo "Username or password error";
			}

		}

	}

?>
</head>
<body>
	<h1>Sign up</h1>

	<form action="" method="POST">
		<label>Username :</label>
		<input class="" type="text" name="username">
		<label>Password :</label>
		<input type="password" name="password">
		<input type="submit" name="submit" value="Sign up">
	</form>
	<br><br>
	<a href="register.php">Ain't got account</a>
</body>
</html>