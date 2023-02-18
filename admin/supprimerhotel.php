<?php
require_once('../connect.php');
$id_hotel=$_GET['id_hotel'];

$requete0="SELECT * FROM hotels WHERE id_hotel=$id_hotel";
$resultat0=mysqli_query($connexion,$requete0);
$ligne=mysqli_fetch_assoc($resultat0);
$chemin_photo=$ligne['image'];
unlink($chemin_photo);

$sql="DELETE FROM hotels WHERE id_hotel =$id_hotel";
$resultat=mysqli_query($connexion,$sql);
header("Location:adminhome.php");
?>