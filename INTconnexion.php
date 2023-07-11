<?php
 class MaConnexion{

    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse , $nomUtilisateur , $hote){
        
        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;
        
        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn,$this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connexion reussi";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }   
    
    public function select($table, $column){
        try {
            $requete = "SELECT $column from $table";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }

    public function selectReservation($id){
        try {
            $requete = "SELECT * from reservation WHERE ID_Reservation = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }

    public function selectSalle($id){
        try {
            $requete = "SELECT * from salledereunion WHERE ID_Salle = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }

    public function selectSalleVerification($id){
        try {
            $requete = "SELECT * from reservation WHERE ID_Salle = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
    public function insertReservation_Secure($ID_Salle, $nomClient, $date){
        try {
            $insertion = "INSERT INTO  `reservation`(ID_Salle, nomClient, date) VALUES (?, ?, ?)";
            
            $requete = $this -> connexionPDO -> prepare($insertion);
            $requete->bindValue(1, $ID_Salle,PDO::PARAM_INT);
            $requete->bindValue(2, $nomClient,PDO::PARAM_STR);
            $requete->bindValue(3, $date,PDO::PARAM_STR);

            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    public function miseAJourReservation_Secure($ID_Salle, $nomClient, $date, $ID_Reservation)
    {
        try {
            $requete = "UPDATE reservation SET ID_Salle = ?, nomClient = ?, date = ? WHERE ID_Reservation = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindValue(1, $ID_Salle,PDO::PARAM_INT);
            $requete_preparee->bindValue(2, $nomClient,PDO::PARAM_STR);
            $requete_preparee->bindValue(3, $date,PDO::PARAM_STR);
            $requete_preparee->bindValue(4, $ID_Reservation,PDO::PARAM_INT);

            
            $requete_preparee->execute();
            return "mise à jour réussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteReservation_Secure($ID_Reservation){
        try {
            $requete = "DELETE FROM reservation WHERE ID_Reservation = :id";
            $requete_preparee = $this->connexionPDO->prepare($requete);
        
        $requete_preparee->bindParam(':id',$ID_Reservation,PDO::PARAM_INT);
        $requete_preparee->execute();
        return"insersion reussie";
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
 }
?>