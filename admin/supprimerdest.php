<?php
require_once('../connect.php');
$id_dest=$_GET['id_dest'];

$requete0="SELECT * FROM destination WHERE id_dest=$id_dest";
$resultat0=mysqli_query($connexion,$requete0);
$ligne=mysqli_fetch_assoc($resultat0);
$chemin_photo=$ligne['image'];
unlink($chemin_photo);

$sql="DELETE FROM destination WHERE id_dest =$id_dest";
$resultat=mysqli_query($connexion,$sql);
header("Location:adminhome.php");
?>
