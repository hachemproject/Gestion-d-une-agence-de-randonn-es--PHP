<?php
if (isset($_GET['id'])) {
    include("../Model/randonnee.php");
    include("../Model/randonneur.php");
    $DateCurrent = date('Y-m-d');

    $idRandonnee = $_GET['id'];
    $ra= randonnee::getRandonneeById($idRandonnee);
 

    if($ra->date_debut<=  $DateCurrent && $ra->date_fin >= $DateCurrent){//si randonee en cours 
        header("Location:../Vue/Administrateur/Erreur.php?error=Randonnée En Cours Erreur Erreur De Suppression");
     //echo"Randonnée En Cours Erreur De Suppression";
    }else{
        randonnee::supprimerRandonnee($idRandonnee);
        randonneur::supprimerRand($idRandonnee);

        header ("location:../Vue/Administrateur/Randonee.php");
    } 
} else {
    header("Location:../Vue/Administrateur/Erreur.php?error=Randonnée non Supprimé");
}
?>
