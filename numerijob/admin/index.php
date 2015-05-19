<?php

session_start();
if(isset($_GET['var'])){
	if($_GET['var'] == 'dec'){
	session_destroy(); 
	header('Location:login.php');
	}
}

if (isset($_SESSION['username'])) {
	echo "Bonjour ".$_SESSION['username'];
}	
else {
	header('Location:login.php');
}
?>
<br><br><br>
<ul>
	<li><a href="index.php?var=dec">Logout</a></li>
	<li><a href="signout.php">Sign out</a></li>
	<li><a href="form.php" >Offres
	</a></li>

</ul>
<br>







