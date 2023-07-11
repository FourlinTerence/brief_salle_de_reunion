<?php include_once ("INTconnexion.php"); 
$supReservation = new MaConnexion ("salle de reunion","","root","localhost");
$supReservation->deleteReservation_Secure($_POST['ID_Reservation']);
header("Location: Partie_admin.php");
?>