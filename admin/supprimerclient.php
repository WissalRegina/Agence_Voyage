<?php
require_once('../connect.php');
$id=$_GET['id'];
$sql="DELETE FROM login WHERE id =$id";
$resultat=mysqli_query($connexion,$sql);
header("Location:adminhome.php");
?>