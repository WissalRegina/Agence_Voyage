<?php
require_once('../connect.php');
session_start();
if(!isset($_SESSION['email'])){
	header("Location:../index.html");
}

$requete= "SELECT * FROM login WHERE usertype='user'";
$resultat=mysqli_query($connexion,$requete);

if(isset($_POST['ajoutbtn'])){
	$ville=$_POST['ville'];
	$prix=$_POST['prix'];

	$chem_dest="images/".$_FILES['image']['name'];
	$source=$_FILES['image']['tmp_name'];
	move_uploaded_file($source, $chem_dest);
	$req2="INSERT INTO destination (ville,prix,image) VALUES ('$ville',$prix,'$chem_dest')";
	$result=mysqli_query($connexion,$req2);

}
$reqdest="SELECT * FROM destination";
$result3=mysqli_query($connexion,$reqdest);

if(isset($_POST['ajoutbtnhotel'])){
	$nom=$_POST['nomhotel'];
	$adresse=$_POST['adresse'];
	$ville=$_POST['ville'];
	$prix=$_POST['prix'];
	$destination="images/".$_FILES['image']['name'];
	$source=$_FILES['image']['tmp_name'];
	move_uploaded_file($source, $destination);
	$sqll="INSERT INTO hotels (nomhotel,adresse,ville,prix,image) VALUES ('$nom','$adresse','$ville',$prix,'$destination')" ;
	$result5=mysqli_query($connexion,$sqll);
}
$reqhot="SELECT * FROM hotels";
$result6=mysqli_query($connexion,$reqhot);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="taille.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body>
	<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Accueil</a></li>
							<li><a href="#one">Gérer Clients</a></li>
							<li><a href="#two">Gérer destinations</a></li>
							<li><a href="#three">Gérer Hotels</a></li>
							<li><a href="../logout.php">logout</a></li>
							
						</ul>
					</nav>
				</div>
			</section>
<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Bonjour Administrateur</h1>
							<p>Ici vous pouvez gérer les clients, les destinations et les hotels de l'agence.</p>
							<ul class="actions">
								<li><a href="../logout.php">logout</a></li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							
							<div class="content">
								<div class="inner">
									<h2>Mes Clients</h2>
									<table>
										<tr>
											<th>Numéro</th>
											<th>email</th>
											<th>password</th>
											<th>modifier</th>
											<th>Supprimer</th>
										</tr>
										<?php
										while($ligne=mysqli_fetch_assoc($resultat)){
										?>
										<tr>
											<td><?php echo $ligne['id'] ?></td>
											<td><?php echo $ligne['email'] ?></td>
											<td><?php echo $ligne['password'] ?></td>
											<td><a href="modifierclient.php?id=<?php echo $ligne['id']?>">Modifier</a></td>
											<td><a href="supprimerclient.php?id=<?php echo $ligne['id']?>">Supprrimer</a></td>
										</tr>
										<?php
								        }
									    ?>
									</table>

								</div>
							</div>
						</section>

					</section>

				<!-- Two -->
					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
			
							<div >
								<section>
									<span class="icon solid major fa-folder-plus"></span>
									<h3>Ajouter une destination</h3>
									<form action="" method="post" name="form2" enctype="multipart/form-data">
										<input type="text" name="ville"  placeholder="Entrer la ville" /><br>
										<input type="text" name="prix"  placeholder="Entrer le prix" /><br>
										<input type="file" name="image" /><br>
										<input type="submit" name="ajoutbtn" value="Ajouter" />
									</form>
								</section>
								<section>
									
								</section>
								<section>
									<span class="icon solid major fa-folder-open"></span>
									<h3>Table des destinations</h3>
									<table>
										<tr>
											<th>Numéro</th>
											<th>ville</th>
											<th>prix</th>
											<th>Image</th>
											<th>modifier</th>
											<th>Supprimer</th>
										</tr>
										<?php
										while($ligne1=mysqli_fetch_assoc($result3)){
										?>
										<tr>
											<td><?php echo $ligne1['id_dest'] ?></td>
											<td><?php echo $ligne1['ville'] ?></td>
											<td><?php echo $ligne1['prix'] ?></td>
											<td ><img src="<?php echo $ligne1['image'] ?>" height="75" width="90" /></td>
											<td><a href="modifierdest.php?id_dest=<?php echo $ligne1['id_dest'] ?>">Modifier</a></td>
											<td><a href="supprimerdest.php?id_dest=<?php echo $ligne1['id_dest'] ?>">Supprrimer</a></td>

										</tr>
										<?php
								        }
									    ?>
									</table>
								</section>
								<section>
									
								</section>
							</div>
						
						</div>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper style1 fade-up">
						<div class="inner">
							
							<div >
								<section>
									<span class="icon solid major fa-folder-plus"></span>
									<h3>Ajouter un Hotel</h3>
									<form action="" method="post" name="form4" enctype="multipart/form-data">
										<input type="text" name="nomhotel"  placeholder="Entrer le nom de l'Hotel" /><br>
										<input type="text" name="adresse"  placeholder="Entrer l'adresse de l'Hotel" /><br>
										<input type="text" name="ville"  placeholder="Entrer la ville de l'Hotel" /><br>
										<input type="text" name="prix"  placeholder="Entrer le prix de l'Hotel" /><br>
										<input type="file" name="image" /><br>
										<input type="submit" name="ajoutbtnhotel" value="Ajouter" />
									</form>
								</section>
								<section>
									<span class="icon solid major fa-folder-open"></span>
									<h3>Table des hotels</h3>
									<table>
										<tr>
											<th>Numéro</th>
											<th>nom</th>
											<th>adresse</th>
											<th>ville</th>
											<th>prix</th>
											<th>image</th>
											<th>modifier</th>
											<th>Supprimer</th>
										</tr>
										<?php
										while($ligne5=mysqli_fetch_assoc($result6)){
										?>
										<tr>
											<td><?php echo $ligne5['id_hotel'] ?></td>
											<td><?php echo $ligne5['nomhotel'] ?></td>
											<td><?php echo $ligne5['adresse'] ?></td>
											<td><?php echo $ligne5['ville'] ?></td>
											<td><?php echo $ligne5['prix'] ?></td>
											<td ><img src="<?php echo $ligne5['image'] ?>" height="75" width="90" /></td>
											<td><a href="modifierhotel.php?id_hotel=<?php echo $ligne5['id_hotel'] ?>">Modifier</a></td>
											<td><a href="supprimerhotel.php?id_hotel=<?php echo $ligne5['id_hotel'] ?>">Supprrimer</a></td>

										</tr>
										<?php
								        }
									    ?>
									</table>
								</section>
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>WAHSOUSSE Wissal</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


</body>
</html>