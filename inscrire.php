<?php
require_once('connect.php');
if(isset($_POST['btnsubmit'])){
	$email=$_POST['email'];
    $password=$_POST['password'];
    $sql="INSERT INTO login (email,password) VALUES ('$email','$password') " ;
    $resultat=mysqli_query($connexion,$sql);
    echo "vous étes inscrit avec succès !!";
}else{
	echo "vérifier votre email ou mot de passe" ;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style1.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
	<h2>Formulaire d'inscription</h2>
<form action="" method="post" name="form1">
  
  <div class="mb-3">
    <label class="form-label">Entrer Votre Nom</label>
    <input type="text" class="form-control" >
  </div>
    <div class="mb-3">
    <label class="form-label">Entrer Votre Prénom</label>
    <input type="text" class="form-control" >
  </div>
    <div class="mb-3">
    <label class="form-label">Entrer Votre Age</label>
    <input type="text" class="form-control" >
  </div>	
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Créer Votre Mot De Passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirmer Votre Mot De Passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary" name="btnsubmit">S'inscrire</button>
</form>
</body>
</html>