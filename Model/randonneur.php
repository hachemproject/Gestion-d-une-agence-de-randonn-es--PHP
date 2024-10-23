<?php
class Randonneur {
    public $idRandonnee;
    public $cin;


    public function __construct($idRandonnee, $cin) {
        $this->idRandonnee = $idRandonnee;
        $this->cin = $cin;
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
        $s = "<option value='$this->idRandonnee $this->cin' >$this->cin</option>";
        return $s;
    }

    public static function ajouter($rand)
            {
                if(empty($rand->cin)) {
                    die("Erreur : Le champ 'cin' ne peut pas être vide");
                }
                include("Connexion.php");
                $query = $conn->prepare("INSERT INTO randonneur VALUES (:idRadonnee, :cin)");
                $query->bindParam(":idRadonnee", $rand->idRandonnee);
                $query->bindParam(":cin", $rand->cin);
                $nb = $query->execute() ;
                return $nb;
  
            }

                /** */
//methode pour selectioner les 3 utilisateur qui ont reserver dans minimum 3 randonée
            public static function MeilleurUtilisateur() {
                include("Connexion.php");
                
                $sql = "SELECT cin, COUNT(*) AS total_occurrences FROM randonneur GROUP BY cin
                            HAVING total_occurrences >= 3 ORDER BY total_occurrences DESC LIMIT 3";
              
                   $stmt = $conn->query($sql);
                   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                   return $results;
                
            }

            /** */
            public static function AfficherUtilisateurByRand($idRandonnee){
                include("Connexion.php");
                $listUtili = [];
                
                $sql = $conn->prepare("SELECT * FROM randonneur WHERE idRandonnee = :idRandonnee");
                $sql->bindParam(':idRandonnee', $idRandonnee);
                $sql->execute();
                $resultat = $sql->fetchAll();
                
                foreach($resultat as $u) {
                    $listUtili[] = new Randonneur(
                        $u['idRandonnee'],
                        $u['cin']
                    );
                }
                
                return $listUtili;
            }          


            public static function supprimerRand($idRandonnee) {
                include("Connexion.php");
                $sql = $conn->prepare("DELETE FROM randonneur WHERE idRandonnee = :idRandonnee");
                $sql->bindParam(':idRandonnee', $idRandonnee);
                $sql->execute();
                return true;
                
            }
            

}

?>