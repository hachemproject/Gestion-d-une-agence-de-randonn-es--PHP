<?php
$DateCurrent = date('Y-m-d');

$matricule = $_GET['matricule']; 
$marque = $_GET['marque'];
$couleur = $_GET['couleur'];
$date = $_GET['date'];
$nbr = $_GET['nbr'];

include("../Model/Bus.php");

$SelctMatricule = Bus::SelctMatricule($matricule);
if($date>$DateCurrent ){
    header("Location:../Vue/Administrateur/Erreur.php?error=date impossible ");
}else
if($SelctMatricule==true){
    header("Location:../Vue/Administrateur/Erreur.php?error=MATRICLUE est deja trouver ");
    //echo" MATRICLUE est deja trouver";
}
    else {
$bus = new Bus($matricule, $marque, $couleur,$date , $nbr);
$nb = Bus::ajouter($bus);
if ($nb > 0) {
    header("Location:../Vue/Administrateur/Valider.php?valider=Bus Ajouté");
    //echo "bus ajouté";
} else {
    header("Location:../Vue/Administrateur/Erreur.php?error=Bus non Ajouté");
    //echo "non ajouté";

}
    }
?>