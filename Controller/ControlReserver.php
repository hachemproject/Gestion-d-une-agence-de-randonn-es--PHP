<?php
include("../Model/randonnee.php");
include("../Model/randonneur.php");
include("../Model/bus.php");

session_start();

    
$login = $_SESSION["user"];
if (isset($_GET['id'])) {
$idRandonnee = $_GET['id'];
    $ra= randonnee::getRandonneeById($idRandonnee);
    $mat=$ra->matricule;

    $b = bus::SelctMatricule($mat);
    $nbr=$b->nbrPlace;//nombre de place pour bus

    $s=randonnee::countParticipants($idRandonnee);//le nombre reserver deja 
    $reste=$nbr-$s;//le reste 
    
    if ($reste != 0) {
        $p=new randonneur($idRandonnee,$login);

        $s=randonneur::ajouter($p);
        if ($s > 0) {

            echo "bien rserver";
        
        } else {
            echo("<script>alert('ERREUR:Il semble que vous ayez déjà réservé cette randonnée.'); window.location.href = '../Vue/Utilisateur/Accueil.php';</script>");
        }
    }
    else  
    echo("<script>alert('ERREUR:Il semble que cette randonnée soit complète.'); window.location.href = '../Vue/Utilisateur/Accueil.php';</script>");

    //echo "complet";
}

?>