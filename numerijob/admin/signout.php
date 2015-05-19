<?php

session_start();

mysql_connect('localhost','root','');
mysql_select_db('c8s');

mysql_query("DELETE FROM admins WHERE username = '{$_SESSION['username']}'");
header('Location:logout.php')

?>