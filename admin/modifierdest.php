<?php
require_once('../connect.php');
$id_dest=$_GET['id_dest'];
$requete1="SELECT * FROM destination WHERE id_dest = $id_dest";
$result1=mysqli_query($connexion,$requete1);
$ligne=mysqli_fetch_assoc($result1);

if(isset($_POST['btnmodifierd'])){
	$ville=$_POST['ville'];
	$prix=$_POST['prix'];

	$photo_name=$_FILES['image']['name'];
    $chemin_dest="images/".$photo_name;
	$chemins=$_FILES['image']['tmp_name'];
	move_uploaded_file($chemins, $chemin_dest);

	$sql="UPDATE destination SET ville='$ville' , prix=$prix, image='$chemin_dest' WHERE id_dest = $id_dest";
	$resultat=mysqli_query($connexion,$sql);
	header("Location:adminhome.php");
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>modifier destination</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="adminhome.php" class="title">Travel</a>
				<nav>
					<ul>
						<li><a href="adminhome.php">Accueil</a></li>
						
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">Formulaire de mise à Jour de destination</h1>
							<span class="image fit"><img src="images/pic04.jpg" alt="" /></span>
							<form action="" method="post" name="form2">
								<input type="text" value="<?php echo $ligne['id_dest'] ?>" readonly="yes" name="id" />
                                <input type="text" value="<?php echo $ligne['ville'] ?>" name="ville" />
                                <input type="text" value="<?php echo $ligne['prix'] ?>" name="prix" />
                                <input type="file" name="image" /><br/>
                                <input type="submit" value="modifier" class="btn" name="btnmodifierd" />
                            
                            </form>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design:WAHSOUSSE WISSAL</li>
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