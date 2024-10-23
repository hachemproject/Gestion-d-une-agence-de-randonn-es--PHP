<?php
class randonnee {
    public $idRandonnee;
    public $image;
    public $objectif;
    public $ville;
    public $description;
    public $date_debut;
    public $date_fin;
    public $etat;
    public $commentaire;
    public $matricule;
       

    public function __construct($idRandonnee,$image, $objectif, $ville, $description, $date_debut, $date_fin, $etat, $commentaire, $matricule) {
        $this->idRandonnee = $idRandonnee;
        $this->image = $image;
        $this->objectif = $objectif;
        $this->ville = $ville;
        $this->description = $description;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->etat = $etat;
        $this->commentaire = $commentaire;
        $this->matricule = $matricule;
     }
     


        public function __get($attr)
        {
            if (!isset($this->$attr)) return "erreur";
            else return ($this->$attr);
        }
        public function __set($attr, $value)
        {
            $this->$attr = $value;
        }
        
        public function __toString()
        {
            $s = "<tr> <td> $this->idRandonnee </td><td> $this->objectif </td><td> $this->ville </td><td> $this->description </td><td> $this->date_debut </td><td> $this->date_fin </td><td> $this->etat </td><td> $this->commentaire </td><td> $this->matricule </td></tr>";

            return $s;
        }
        


        public static function AjouterRand($randonnee)
        {
            include("Connexion.php");
            
            $query = $conn->prepare("INSERT INTO randonnee VALUES (:idRandonnee,:image,:objectif,:ville,:description,:date_debut,:date_fin,:etat,:commentaire,:matricule)");
            $query->bindParam(":idRandonnee", $randonnee->idRandonnee);
            $query->bindParam(":image", $randonnee->image);
            $query->bindParam(":objectif", $randonnee->objectif);
            $query->bindParam(":ville", $randonnee->ville);
            $query->bindParam(":description", $randonnee->description);
            $query->bindParam(":date_debut", $randonnee->date_debut);
            $query->bindParam(":date_fin", $randonnee->date_fin);
            $query->bindParam(":etat", $randonnee->etat);
            $query->bindParam(":commentaire", $randonnee->commentaire);
            $query->bindParam(":matricule", $randonnee->matricule);
            $nb = $query->execute() or die(print_r($conn->errorInfo()));
            return $nb;
        }
      
            public static function AfficherRandonnee(){
                include("Connexion.php");
                $listArticles = [];
                
                $sql = $conn->prepare("SELECT * FROM randonnee");
                $sql->execute();
                $resultat = $sql->fetchAll();
                
                foreach($resultat as $ar) {
                    $listArticles[] = new Randonnee(
                        $ar['idRandonnee'],
                        $ar['image'],
                        $ar['objectif'],
                        $ar['ville'],
                        $ar['description'],
                        $ar['date_debut'],
                        $ar['date_fin'],
                        $ar['etat'],
                        $ar['commentaire'],
                        $ar['matricule']
                    );
                }
                
                return $listArticles;
            }           
            
            /* */
            public static function countParticipants($idRandonnee) { 
                include("Connexion.php");
                $sql = "SELECT COUNT(cin) AS nombre_utilisateurs FROM randonneur WHERE idRandonnee = :idRandonnee";
            
                     $stmt = $conn->prepare($sql);
                     $stmt->bindParam(':idRandonnee', $idRandonnee, PDO::PARAM_INT);
                     $stmt->execute();
                    $resultat = $stmt->fetchColumn();
                    return $resultat;
                }



                /**/
                public static function supprimerRandonnee($idRandonnee) {
                    include("Connexion.php");
                    $sql = $conn->prepare("DELETE FROM randonnee WHERE idRandonnee = :idRandonnee");
                    $sql->bindParam(':idRandonnee', $idRandonnee);
                    $sql->execute();
                    return true;
                    
                }


                /**/
                public static function getRandonneeById($id) {
                    include("Connexion.php");

                    $sql=$conn->query("SELECT * FROM randonnee WHERE idRandonnee='$id' ");
                    $sql->setFetchMode(PDO::FETCH_OBJ);
                    $resultat=$sql->fetch();
                    return $resultat;
                  }

                public static function modifierArticle($rand)
        {
            include("Connexion.php");

            $query = $conn->prepare("UPDATE randonnee SET image=:image, objectif = :objectif, ville = :ville, description = :description,date_debut = :date_debut, 
            date_fin = :date_fin,etat = :etat,commentaire = :commentaire,matricule = :matricule WHERE idRandonnee = :idRandonnee");
                $query->bindParam(':image', $rand->image);
        $query->bindParam(':objectif', $rand->objectif);
        $query->bindParam(':ville', $rand->ville);
        $query->bindParam(':description', $rand->description);
        $query->bindParam(':date_debut', $rand->date_debut);
        $query->bindParam(':date_fin', $rand->date_fin);
        $query->bindParam(':etat', $rand->etat);
        $query->bindParam(':commentaire', $rand->commentaire);
        $query->bindParam(':matricule', $rand->matricule);
        $query->bindParam(':idRandonnee', $rand->idRandonnee);
        $nb = $query->execute() or die(print_r($conn->errorInfo()));
            return $nb;
        }
        public static function NombreBus() {
            include("Connexion.php");
            
            $sql = $conn->query("SELECT COUNT(*) as total FROM bus");            
            $resultat = $sql->fetch(PDO::FETCH_ASSOC);
            return $resultat['total'];
        }

        /** */
        public static function NombreRandonnee() {
            include("Connexion.php");
            $sql = $conn->query("SELECT COUNT(*) as total FROM randonnee");
            $resultat = $sql->fetch(PDO::FETCH_ASSOC);
            return $resultat['total'];
        }

        public static function getRandonneeByMat($mt){
            include("Connexion.php");
            $listArticles = [];
            
            $sql=$conn->query("SELECT * FROM randonnee WHERE matricule='$mt' ");
            $sql->execute();
            $resultat = $sql->fetchAll();
            
            foreach($resultat as $ar) {
                $listArticles[] = new Randonnee(
                    $ar['idRandonnee'],
                    $ar['image'],
                    $ar['objectif'],
                    $ar['ville'],
                    $ar['description'],
                    $ar['date_debut'],
                    $ar['date_fin'],
                    $ar['etat'],
                    $ar['commentaire'],
                    $ar['matricule']
                );
            }
            
            return $listArticles;
        }  
        //*//
        public static function AfficherEtatRand($etat){
            include("Connexion.php");
            $listArticles = [];
            $sql = $conn->prepare("SELECT * FROM randonnee WHERE etat=:etat");
            $sql->bindParam(':etat', $etat); 
            $sql->execute();
            $resultat = $sql->fetchAll();
        
            foreach($resultat as $ar) {
                $listArticles[] = new Randonnee(
                    $ar['idRandonnee'],
                    $ar['image'],
                    $ar['objectif'],
                    $ar['ville'],
                    $ar['description'],
                    $ar['date_debut'],
                    $ar['date_fin'],
                    $ar['etat'],
                    $ar['commentaire'],
                    $ar['matricule']
                );
            }
        
            return $listArticles;
        }

        public static function ContrlModifRanCour($rand)
        {
            include("Connexion.php");

            $query = $conn->prepare("UPDATE randonnee SET date_fin = :date_fin,etat = :etat,commentaire = :commentaire WHERE idRandonnee = :idRandonnee");
        
        $query->bindParam(':date_fin', $rand->date_fin);
        $query->bindParam(':etat', $rand->etat);
        $query->bindParam(':commentaire', $rand->commentaire);
        $query->bindParam(':idRandonnee', $rand->idRandonnee);
        $nb = $query->execute() or die(print_r($conn->errorInfo()));
            return $nb;
        }

        public static function ContrlModifEtat($rand)
        {
            include("Connexion.php");

            $query = $conn->prepare("UPDATE randonnee SET etat = :etat WHERE idRandonnee = :idRandonnee");
        
        $query->bindParam(':etat', $rand->etat);
        $query->bindParam(':idRandonnee', $rand->idRandonnee);
        $nb = $query->execute() or die(print_r($conn->errorInfo()));
            return $nb;
        }

        public static function SelctIdRand($idRandonnee){
       
            include("Connexion.php");
    
          $sql=$conn->query("SELECT * FROM randonnee WHERE idRandonnee='$idRandonnee'");
          $sql->setFetchMode(PDO::FETCH_OBJ);
          $resultat=$sql->fetch();
          return $resultat;
            }
}

?>