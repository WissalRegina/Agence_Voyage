<?php
session_start();
require_once('connect.php');

	$email=$_POST['email'];
	$password=$_POST['password'];

	$requete="SELECT * FROM login WHERE email='".$email."' AND password='".$password."' ";
	$resultat=mysqli_query($connexion,$requete);

	$ligne=mysqli_fetch_array($resultat);
	if($ligne["usertype"]=="user"){
		$_SESSION["email"]=$email;
		header("Location:user/userhome.php");
	}elseif($ligne["usertype"]=="admin"){
		$_SESSION["email"]=$email;
		header("Location:admin/adminhome.php");
	}else {
		echo "email ou mot de passe incorrecte";
	}

?>