
<?php
include("../Model/randonnee.php");
$DateCurrent = date('Y-m-d');

$id = $_POST["id"];
$objectif = $_POST["objectif"];
$ville = $_POST["ville"];
$description = $_POST["description"];
$dateDebut = $_POST["dateDeb"];
$dateFin = $_POST["dateFin"];
$commentaire = $_POST["Commentaire"];
$bus = $_POST["bus"];

$listArt = randonnee::getRandonneeByMat($bus);
$trouve=true;
foreach($listArt as $Art)
{    $deb=$Art->__get('date_debut');
    $fin=$Art->__get('date_fin') ;
    
    if (($dateDebut >= $deb && $dateDebut <= $fin)||($dateFin >= $deb && $dateFin <= $fin)||($dateDebut<=$deb && $dateFin>=$fin)) {
        $trouve=false;
      }
}


if (isset($_FILES['img'])) {
    $imgFile = $_FILES['img']['name'];
    $tmp_dir = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];
      
   
   
        $upload_dir = '../vue/photos/'; //répertoire de telechargement
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //obtenir l'extension de l'image
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
      
        //renommer le fichier téléversé
        $userpic = rand(1000,1000000).".".$imgExt;
        
        if(in_array($imgExt, $valid_extensions)){   
            if($imgSize < 5000000) {
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            }
            else {
                header("Location:../Vue/Administrateur/Erreur.php?error=Sorry, your file is too large.");
                $errMSG = "Sorry, your file is too large.";
            }
        }
        else {
           header("Location:../Vue/Administrateur/Erreur.php?error=Sorry, only JPG, JPEG, PNG & GIF files are allowed");
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
        }
    }

if(!isset($errMSG)) {
   $SelectRand = randonnee::getRandonneeById($id);
   if($dateDebut<=$DateCurrent ){
      header("Location:../Vue/Administrateur/Erreur.php?error=Erreur: la date doit etre supérieur au date d'aujourd'hui");
   }else
    if($dateDebut>=$dateFin ){
        header("Location:../Vue/Administrateur/Erreur.php?error=date impossible");
        }else {
        if($SelectRand==true){
            header("Location:../Vue/Administrateur/Erreur.php?error=randonnee est déja trouver");
            //echo" randonnee est deja trouver";
        }else{
            if($trouve==false){
                header("Location:../Vue/Administrateur/Erreur.php?error=bus indisponible");
                //echo" bus indisponible";
            }
            else{
    $randonnee = new randonnee($id,$userpic,$objectif,$ville,$description,$dateDebut ,$dateFin,0,$commentaire,$bus);
    $nb = randonnee::AjouterRand($randonnee);
    if ($nb > 0) {

        header("Location:../Vue/Administrateur/Valider.php?valider=Randonée Ajouté");
//randonée ajouter
    } else {
        header("Location:../Vue/Administrateur/Erreur.php?error=Randonée non Ajouté");
        //echo"randonée non ajouté";
    }
}
    }
    }

}



















?>