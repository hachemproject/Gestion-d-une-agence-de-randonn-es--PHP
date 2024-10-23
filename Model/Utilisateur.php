   <?php
class utilisateur{
    private $cin;
    private $image;
    private $password;
    private $nom;
    private $prenom;
    private $date_naiss;
    private $email;
    private $role;

  /*  function __construct($login, $password, $nom, $cin, $date_naiss,$email,$rol)
        {
            $this->login = $login;
            $this->password = $password;
            $this->nom = $nom;
            $this->cin = $cin;
            $this->date_naiss = $date_naiss;
            $this->email = $email;
            $this->rol = $rol;

        }
*/
public function __construct($cin,$image, $password, $nom, $prenom, $date_naiss, $email, $role) {
    $this->cin = $cin;
    $this->image = $image;
    $this->password = $password;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->date_naiss = $date_naiss;
    $this->email = $email;
    $this->role = $role;
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
            $s = "<tr> <td> $this->cin </td><td> $this->image </td><td> $this->password </td><td> $this->nom </td><td> $this->prenom </td><td> $this->date_naiss </td><td> $this->etat </td><td> $this->email </td></tr>";

            return $s;
        }

        public static function connect($cin, $password){
       
            include("Connexion.php");
    
          $sql=$conn->query("SELECT * FROM utilisateur WHERE cin='$cin'and password='$password'");
          $sql->setFetchMode(PDO::FETCH_OBJ);
          $resultat=$sql->fetch();
          return $resultat;
            }

            
        public static function ajouter($utilisateur)
            {
                if(empty($utilisateur->image)) {
                    die("Erreur : Le champ 'cin' ne peut pas être vide");
                }
                include("Connexion.php");
                $query = $conn->prepare("INSERT INTO utilisateur VALUES (:cin,:image, :password,:prenom, :nom, :date_naiss,:email,:role)");
                $query->bindParam(":cin", $utilisateur->cin);
                $query->bindParam(":image", $utilisateur->image);
                $query->bindParam(":password", $utilisateur->password);
                $query->bindParam(":nom", $utilisateur->nom);
                $query->bindParam(":prenom", $utilisateur->prenom);
                $query->bindParam(":date_naiss", $utilisateur->date_naiss);
                $query->bindParam(":email", $utilisateur->email);
                $query->bindParam(":role", $utilisateur->role);
                $nb = $query->execute() ;
                return $nb;
  
            }
/* */
            public static function SelctCin($cin){
       
                include("Connexion.php");
        
              $sql=$conn->query("SELECT * FROM utilisateur WHERE cin='$cin'");
              $sql->setFetchMode(PDO::FETCH_OBJ);
              $resultat=$sql->fetch();
              return $resultat;
                }
                
                public static function SelctEmail($email){
       
                    include("Connexion.php");
            
                  $sql=$conn->query("SELECT * FROM utilisateur WHERE email='$email'");
                  $sql->setFetchMode(PDO::FETCH_OBJ);
                  $resultat=$sql->fetch();
                  return $resultat;
                    }



                     /**/
                    public static function AfficherUtilisateur(){
                        include("Connexion.php");
                        $listUtili = [];
                        
                        $sql = $conn->prepare("SELECT * FROM utilisateur");
                        $sql->execute();
                        $resultat = $sql->fetchAll();
                        
                        foreach($resultat as $u) {
                            $listUtili[] = new utilisateur(
                                $u['cin'],
                                $u['image'],
                                $u['password'],
                                $u['prenom'],
                                $u['nom'],
                                $u['date_naiss'],
                                $u['email'],
                                $u['role']

                            );
                        }
                        
                        return $listUtili;
                    }     

                    /** */
                    public static function NombreUtilisateur() {
                        include("Connexion.php");
                        $sql = $conn->query("SELECT COUNT(*) as total FROM utilisateur");
                        $resultat = $sql->fetch(PDO::FETCH_ASSOC);
                        return $resultat['total'];
                    }

                    /** */
                    public static function AfficherUtilisateurByCin($cin) {
                        include("Connexion.php");
                        $listUtili = [];
                        
                        $sql = $conn->prepare("SELECT * FROM utilisateur WHERE cin = :cin");
                        $sql->bindParam(':cin', $cin);
                        $sql->execute();
                        $resultat = $sql->fetchAll();
                        
                        foreach($resultat as $u) {
                            $listUtili[] = new Utilisateur(
                                $u['cin'],
                                $u['image'],
                                $u['password'],
                                $u['prenom'],
                                $u['nom'],
                                $u['date_naiss'],
                                $u['email'],
                                $u['role']
                            );
                        }
                        
                        return $listUtili;
                    }  
}
    ?>
