<?php include("INTconnexion.php");
$gestionDesReservations = new MaConnexion("salle de reunion","","root","localhost"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Location de salle de reunion</title>
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
            <h1>Reservez votre salle en toute simplicité</h1>
        </div>
    </header>
    <main>
        <section class="deuxiemePartie">
            <?php $salle = $gestionDesReservations->select("salledereunion", "*");
            foreach ($salle as $uneDonnees) {
                echo ' -->
            <form>
                <div class="carteAvecBouton">
                    <h3 class="texteCarteAvecBouton">' . $uneDonnees['nom'] . '</h3>
                    <img src="' . $uneDonnees['image'] . '" alt="">

                    <p class="texteItalique">Nombre de place maximum: ' . $uneDonnees['nbPlace'] . '</p>
                    <button class="boutonCarte" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservation'.$uneDonnees['ID_Salle'].'">
                    Reserver cette salle
                    </button>
                </div>
            </form>';
            }
            ?>
        </section>

        <!-- Button trigger modal -->
<button class="boutonCarte" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Reserver cette salle
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </main>
    <footer>
        <p>&copy;FOURLIN Terence 's application. Tous droits réservés.</p>
    </footer>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>