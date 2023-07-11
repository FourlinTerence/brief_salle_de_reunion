<?php include_once ("INTconnexion.php");
$uneInsertion = new MaConnexion ("salle de reunion","","root","localhost");
$uneInsertion->insertReservation_Secure($_POST['ID_Salle'],$_POST['nomClient'],$_POST['date']);
header("Location: Partie_admin.php");
?>