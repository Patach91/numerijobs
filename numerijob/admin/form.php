<?php

$serveur= "localhost"; 
$utilisateur= "root"; 
$motdepasse= ""; 

if(isset($_POST['nom'])){
$madate = date('Y-m-d'); 
$nom = $_POST['nom'];
$poste = $_POST['poste'];
$mail = $_POST['mail'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$descriptif = $_POST['descriptif'];

$requete = "INSERT INTO form (`id_form`, `date`, `nom`, `poste`, `mail`, `cp`, `ville`, `descriptif`) ";  
$requete .= "VALUES (NULL, '".$madate."', '".$nom."', '".$poste."', '".$mail."', '".$cp."', '".$ville."', '".$descriptif."');"; 

$db = mysql_connect($serveur, $utilisateur, $motdepasse );
mysql_select_db('c8s', $db);
$req = mysql_query($requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());

}

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<title>FORMULAIRE</title>
</head>
<body>

  <form action="form.php" method="post"> 
    <input class="form-control" type="text" name="nom" maxlength="80" placeholder="Nom d'entreprise">
    <input class="form-control" type="text" name="poste" maxlength="80" placeholder="Poste rechercher">
    <input class="form-control" type="email" name="mail" maxlength="80" placeholder="Adress mail">
    <input class="form-control" type="text required" name="cp" maxlength="5" placeholder="Code Postal">
    <input class="form-control" type="text" name="ville" maxlength="80" placeholder=" Ville">
    <textarea class="form-control" name="descriptif" maxlength="1000" placeholder="Descriptif poste"></textarea>
    <input type="submit" class="form-control bnt btn-success" value="Envoyer"> 
  </form>



<table class="table">
	<tr>
  <th>Date</th>
	<th>Nom Entreprise</th>
	<th>Poste Rechercher</th>
  <th>Adress Email</th>
  <th>Code Postal</th>
  <th>Ville</th>
  <th>Descriptif Poste</th>

	
</tr>
<?php


mysql_connect($serveur, $utilisateur, $motdepasse) or die(mysql_error());
mysql_select_db("c8s") or die(mysql_error());

$result = mysql_query("SELECT * FROM form") 
or die(mysql_error());  


while($row = mysql_fetch_array( $result )) 
{
    echo '<tr>'; 
    $min = substr($row['date'], 14,2);
    $h = substr($row['date'], 11,2);
    $j = substr($row['date'], 8,2);  
    $m = substr($row['date'], 5,2);
    $a = substr($row['date'], 0,4);

    echo '<td> Le  '.$j.' / '.$m.' / '.$a.'</td>';
    echo '<td>'.$row['nom'].'</td>'; 
    echo '<td>'.$row['poste'].'</td>';
    echo '<td>'.$row['mail'].'</td>'; 
    echo '<td>'.$row['cp'].'</td>';
    echo '<td>'.$row['ville'].'</td>'; 
    echo '<td>'.$row['descriptif'].'</td>';
    echo '</tr>'; 

} 


?>
</table>

  <script src="bootstrap/jquery/jquery-1.11.2.min.js"></script> 
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>