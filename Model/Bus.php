<?php
class bus{
    private $matricule;
    private $marque;
    private $couleur;
    private $date;
    private $nbrPlace;
    //private $etat;


    public function __construct($matricule, $marque, $couleur, $date,$nbrPlace) {
        $this->matricule = $matricule;
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->date = $date;
        $this->nbrPlace = $nbrPlace;
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
        $s = "<option value='$this->matricule ' >$this->matricule</option>";
        return $s;
    }

    public static function ajouter($bus)
            {
                
                include("Connexion.php");
                $query = $conn->prepare("INSERT INTO bus VALUES (:matricule, :marque, :couleur, :date, :nbrPlace)");
                $query->bindParam(":matricule", $bus->matricule);
                $query->bindParam(":marque", $bus->marque);
                $query->bindParam(":couleur", $bus->couleur);
                $query->bindParam(":date", $bus->date);
                $query->bindParam(":nbrPlace", $bus->nbrPlace);
                
                $nb = $query->execute() ;
                return $nb;
            } 






            public static function SelctMatricule($matricule){
       
                include("Connexion.php");
        
              $sql=$conn->query("SELECT * FROM bus WHERE matricule='$matricule'");
              $sql->setFetchMode(PDO::FETCH_OBJ);
              $resultat=$sql->fetch();
              return $resultat;
                }


                
                public static function getAllBus()
                {
                    include("Connexion.php");
                $resultat=$conn->query("SELECT * from bus");
                $resultat->setFetchMode(PDO::FETCH_OBJ);
                $news=$resultat->fetchAll();
            
               foreach($news as $ligne){
                echo '<option value='.$ligne->matricule.'>'.$ligne->matricule.'</option>';
            
                 }
            
            }
                    
            /** */
            public static function NombreBus() {
                include("Connexion.php");
                $sql = $conn->query("SELECT COUNT(*) as total FROM bus");
                $resultat = $sql->fetch(PDO::FETCH_ASSOC);
                 return $resultat['total'];
            }


         
            public static function AfficherBus(){
                include("Connexion.php");
                $listArticles = [];
                
                $sql = $conn->prepare("SELECT * FROM bus");
                $sql->execute();
                $resultat = $sql->fetchAll();
                
                foreach($resultat as $ar) {
                    $listArticles[] = new bus(
                        $ar['matricule'],
                        $ar['marque'],
                        $ar['couleur'],
                        $ar['date'],
                        $ar['nbrPlace']
                    );
                }
                return $listArticles;

            }
            }
           
?>