<?php
            include("../Model/randonnee.php");
            $DateCurrent = date('Y-m-d');
$idRandonnee =$_GET['id'];
$a=randonnee::SelctIdRand($idRandonnee);

$objectif=$_GET['objectif'];
$ville =$_GET['ville'];
$description=$_GET['description'];
$etat =$a->etat;
$image=$a->image;
$commentaire=$_GET['commentaire'];;



if($a->date_fin<$DateCurrent )// Si Finalisé
{   
    if($a->etat!=2){
        $etat =2;
    }
    $dateDeb =$a->date_debut;
    $dateFin=$a->date_fin;
    $bus=$a->matricule;

    $Ar = new Randonnee($idRandonnee,$image, $objectif, $ville, $description, $dateDeb, $dateFin, $etat, $commentaire, $bus);
    $nb = randonnee::modifierArticle($Ar);
    if ($nb > 0) {
        header("Location:../Vue/Administrateur/Valider.php?valider=Randonée modifié");
        //echo "modifier";
    }else
    header("Location:../Vue/Administrateur/Erreur.php?error= erreur");
}

if($a->date_debut>$DateCurrent ){//si en attend
    
    $dateDeb =$_GET['dateDeb'];
    $dateFin=$_GET['dateFin'];
    $bus =$_GET['bus'];
    $listArt = randonnee::getRandonneeByMat($bus);

    $trouve=true;
    foreach($listArt as $Art)
      { if($Art->__get('idRandonnee')!=$idRandonnee)
        {
           $deb=$Art->__get('date_debut');
           $fin=$Art->__get('date_fin') ;
           if (($dateDeb >= $deb && $dateDeb <= $fin)||($dateFin >= $deb && $dateFin <= $fin)||($dateDeb<=$deb && $dateFin>=$fin)) {
           $trouve=false;
        }
    }
}
if($dateDeb<=$DateCurrent ){
    header("Location:../Vue/Administrateur/Erreur.php?error=date impossible");
}else{
if($dateDeb>=$dateFin ){
    header("Location:../Vue/Administrateur/Erreur.php?error=date impossible");
}else{
    if($trouve==false){
        header("Location:../Vue/Administrateur/Erreur.php?error= bus indisponible");
        //echo" bus indisponible";
    }else{


        $Ar = new Randonnee($idRandonnee,$image, $objectif, $ville, $description, $dateDeb, $dateFin, $etat, $commentaire, $bus);
          //$Ar = new Article($ref, $libelle, $four, $prix, $qtestk);
            $nb = randonnee::modifierArticle($Ar);
            if ($nb > 0) {
                header("Location:../Vue/Administrateur/Valider.php?valider=Randonée modifié");
                //echo "modifier";
            }else
            header("Location:../Vue/Administrateur/Erreur.php?error= erreur");
            //echo"erreur";
        
        }
}
}

}
//if ($Art->__get('date_debut') <= $DateCurrent && $Art->__get('date_fin') >= $DateCurrent)

if( $a->date_debut<= $DateCurrent && $a->date_fin >= $DateCurrent){///si en cours
    $dateDeb=$a->date_debut;
    $bus=$a->matricule;
    $dateFin=$_GET['dateFin'];
    if($a->etat!=1){
        $etat =1;
    }
    if($a->date_debut>=$dateFin ){
        header("Location:../Vue/Administrateur/Erreur.php?error=date impossible");
        //echo" date imposible";
    }else{
        $Ar = new Randonnee($idRandonnee,$image, $objectif, $ville, $description, $dateDeb, $dateFin, $etat, $commentaire, $bus);

    //$Ar = new Article($ref, $libelle, $four, $prix, $qtestk);
    $nb = randonnee::modifierArticle($Ar);
    if ($nb > 0) {
        header("Location:../Vue/Administrateur/Valider.php?valider=Randonée modifié");
        //echo "modifier";
    }else
    header("Location:../Vue/Administrateur/Erreur.php?error= erreur");
    //echo"erreur";


    }
 
}

?>