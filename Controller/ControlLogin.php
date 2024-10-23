
<?php
include("../Model/Utilisateur.php");
$cin =$_GET['cin'];
$password=$_GET['password'];

$a=utilisateur::SelctCin($cin);
$passe_hache=$a->password;//password déja Haché

if ($a==false||$a==null)
{
   header ("location:../Vue/Authentification/login.php?erreur= Cin Ou Password Incorrect");
}else{
  if (password_verify($password, $passe_hache))
   {
     session_start();
     $_SESSION["user"] = $cin;
     if($a->role == 0) 
       header ("location:../Vue/Utilisateur/Accueil.php");
         //echo"utlisateur";
     else 
     header ("location:../Vue/Administrateur/Administration.php");
       //echo"randonneur"; 
   }else
   header ("location:../Vue/Authentification/login.php?erreur= Cin Ou Password Incorrect");
   }
 


 

 

?>


