<?php include_once ("INTconnexion.php"); 
$uneMiseAJour = new MaConnexion ("salle de reunion","","root","localhost");
$uneMiseAJour->miseAJourReservation_Secure($_POST['ID_Salle'],$_POST['nomClient'],$_POST['date'],$_POST['ID_Reservation']);
header("Location: Partie_admin.php");
?>