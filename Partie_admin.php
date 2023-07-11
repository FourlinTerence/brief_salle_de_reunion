<?php include("INTconnexion.php");
$gestionDesReservations = new MaConnexion("salle de reunion","","root","localhost"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <nav>
            <a href="#">Salle 1</a>
            <a href="#">Salle 2</a>
            <a href="#">Salle 3</a>
            <a href="#">Salle 4</a>
            <input type="button" value="CONTACT" />
        </nav>
        <div class="premierePartie">
            <h1>Gestion des reservations</h1>
        </div>
    </header>
    <main>
        <div class="tableContainer">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Salle</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $reservation = $gestionDesReservations->select("reservation", "*");
                    foreach ($reservation as $uneDonnees) {
                        echo '
                    <form method="POST" action="miseAJourReservation.php">
                    <tr>
                        <td><input type="number" class="form-control" name="ID_Salle" value="' . $uneDonnees['ID_Salle'] . '"></td>
                        <td><input type="text" class="form-control" name="nomClient" value="' . $uneDonnees['nomClient'] . '"></td>
                        <td><input type="date" class="form-control" name="date" value="' . $uneDonnees['date'] . '"></td>
                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Ajouter'.$uneDonnees['ID_Reservation'].'">Ajout</button>
                            <button type="submit" class="btn btn-outline-warning">Modif</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#supp' . $uneDonnees['ID_Reservation'] . '">Suppr</button>
                        </td>
                    </tr>
                    <input type="hidden" class="form-control" name="ID_Reservation" value="' . $uneDonnees['ID_Reservation'] . '">
                </form>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <!-- Modal Ajout -->
        <?php 
        foreach ($reservation as $uneDonnees){
            echo '
        <form method="POST" action="AjoutDeReservation.php">
            <div class="modal fade" id="Ajouter'.$uneDonnees['ID_Reservation'].'" tabindex="-1" aria-labelledby="exampleModalLabel'.$uneDonnees['ID_Reservation'].'" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="insertionProduit.php">
                            <div class="modal-header">
                                <h2 class="modal-title fs-5" id="exampleModalLabel'.$uneDonnees['ID_Reservation'].'">Reservation</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Formulaire de reservation</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Insersion</h6>
                                        <div class="mb-3">
                                            <label for="ID_Salle" class="form-label">ID de la salle</label>
                                            <input type="number" class="form-control" id="ID_Salle" name="ID_Salle" placeholder="inserez l ID de la salle" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomClient" class="form-label">Nom du client</label>
                                            <input type="text" class="form-control" id="nomClient" name="nomClient" placeholder="indiquez le nom du client" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Indiquez la date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" name="ID_Reservation" value="'.$uneDonnees['ID_Reservation'].'">
        </form>';
        }
        ?>
        <!-- Modal Supprimer -->
        <?php
        foreach ($reservation as $uneDonnees)
        echo '
        <form method="POST" action="suppressionReservation.php">;
        <div class="modal fade" id="supp'. $uneDonnees['ID_Reservation'] .'" tabindex="-1" aria-labelledby="supp'. $uneDonnees['ID_Reservation'] .'" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="supp'. $uneDonnees['ID_Reservation'] .'">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input  type="hidden" class="form-control" name="id" value="'.$uneDonnees['ID_Reservation'] . '">
                       <p> Etes vous sur de vouloir supprimer la reservation du client '. $uneDonnees['nomClient'] .'
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-danger">Confirmer</button>
                    </div>
                </div>
            </div>
        </div>
        </form>'
        ?>
    </main>
    <footer>
        <p>&copy;FOURLIN Terence 's application. Tous droits réservés.</p>
    </footer>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>