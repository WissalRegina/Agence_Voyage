<?php
session_start();

if(!isset($_SESSION['email'])){
	header("Location:../index.html");
}
//echo htmlentities(trim($_SESSION['email']));
require_once('../connect.php');
$requete="SELECT * FROM destination";
$resultat=mysqli_query($connexion,$requete);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reservation</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="userhome.php">Relax&Fly</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Reserver Vol</a></li>
                        <li class="nav-item"><a class="nav-link" href="reserverhotel.php">Reserver Hotel</a></li>
                       <li class="nav-item"><a class="nav-link" href="../logout.php">logout</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Formulaire de Réservation</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Vol</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div >
                <div >   
                 <form action="rvol.php" method="post">
                	<table>
                		<tr>
                			<td>entrez votre nom:</td>
                			<td><input type="text" name="nom"></td>
                		</tr>
                		<tr>
                			<td>entrez votre prénom:</td>
                			<td><input type="text" name="prenom"></td>
                		</tr>
                		<tr>
                			<td>entrez votre age:</td>
                			<td><input type="text" name="age"></td>
                		</tr>
                		<tr>
                			<td>sélectionez votre destination souhaité:</td>
                		</tr>
                		<?php
                		while($ligne=mysqli_fetch_assoc($resultat)){
                		?>
                		<tr>
                			<td><?php echo $ligne['ville'] ?></td>
                			<td><?php echo $ligne['prix'] ?></td>
                			<td><?php echo $ligne['image'] ?></td>
                			<td><input type="radio" name="choisir" value="<?php echo $ligne['id_dest'] ?>"></td>

                		</tr>	
                		<?php
                		}
                		?>
                		<tr>
                			<td><input class="btn btn-outline-dark" type="submit" name="btnresv" value="Réserver"></td>
                		</tr>
                		
                	</table>
                	
                </form>
 
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy;WAHSOUSSE Wissal</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>