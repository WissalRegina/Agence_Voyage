<?php
require_once('../connect.php');
require('fpdf.php');
if(isset($_POST['btnresv'])){
    $dest=$_POST['choisir'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $age=$_POST['age'];


    $sql=" SELECT * FROM destination WHERE id_dest=$dest";
    $res=mysqli_query($connexion,$sql);

    $ligne=mysqli_fetch_assoc($res);


    $pdf = new FPDF();
    $pdf->AddPage();
    
    $pdf->SetFont('Arial','B',16);
    $pdf->Image('logo.png',10,6,30);$pdf->Ln(30);
    $pdf->Cell(40,10,'Agence de Voyage : Relax&Fly');$pdf->Ln(10);
    $pdf->Cell(40,10,'Reservation du Voyage');$pdf->Ln(20);
    $pdf->Cell(40,10,'Nom'.$nom);$pdf->Ln(10);
    $pdf->Cell(40,10,'Prénom'.$prenom);$pdf->Ln(10);
    $pdf->Cell(40,10,'age: '.$age);$pdf->Ln(10);
    $pdf->Cell(40,10,'Destination choisie:');$pdf->Ln(20);
    $pdf->Cell(40,10,$ligne['image']);$pdf->Ln(10);
    $pdf->Cell(40,10,'ville :'.$ligne['ville']);$pdf->Ln(10);
    $pdf->Cell(40,10,'prix :'.$ligne['prix'].' Dhms');$pdf->Ln(10);


$pdf->Output();

}





?>