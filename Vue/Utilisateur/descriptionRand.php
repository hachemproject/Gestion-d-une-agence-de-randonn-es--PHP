<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="description.css"> 

    <title>Document</title>
</head>
<body>

<?php
session_start();
$login = $_SESSION["user"];

    include("../../Model/randonnee.php");
    include("../../Model/bus.php");

    $idRandonnee = $_GET['id'];
    $ra= randonnee::getRandonneeById($idRandonnee);

        
							 include("../../Model/Utilisateur.php");
                             $a=utilisateur::SelctCin($login);
                             echo "<a style='color: black; font-size: 35px;'>" . $a->nom . " <span style='color: #1b9bff; font-size: 30px;'>" . $a->prenom . "</span></a>";
                             echo"<br>";
                             echo "<td><a href='Accueil.php' class='btn btn-danger' style='color: black;background-color: white; text-align: center;'>Accueil</a></td>";


     

?>
<section>





    <?php 
    
           echo" <div>";
               echo" <p class='titre__game'>".$ra->ville."</p>";
           echo" </div>";
          
           echo "<div><img src='../photos/" . $ra->image . "' width='500' style='border-radius: 8px;' /></div>";
           ?>


            <div>
                <p class="titre_dis__game">
                    À PROPOS NOTRE RANDONEE:
                </p>
                <?php
             echo "<p class='dis__game'>
             Nous organisons une excitante randonnée le " . $ra->date_debut . " dans les magnifiques environs de " . $ra->ville . " qui offre une expérience enrichissante au cœur de la nature. Nous serions ravis que vous vous joigniez à nous pour cette aventure en plein air !
             </p>";
                 ?>
                    <p class="titre_dis__game">
                    Voici quelques détails sur la randonnée :
                </p>
                <ul class="dis__game">
                <?php

                     $DateCurrent = date('Y-m-d');
                    //echo $DateCurrent;
                    echo" <li>ID:" . $ra->idRandonnee . "</li>";
               echo" <li>Date Debut:" . $ra->date_debut . "</li>";
               echo"  <li>Date Fin: " . $ra->date_fin . "</li>";
               echo"<li>Objectif de la randonnée :" . $ra->objectif . "</li>";
               echo"<li>Description: " . $ra->description . "</li>";
               echo"<li>Commentire:" . $ra->commentaire . "</li>";
               echo"<li>Bus: " . $ra->matricule . "</li>";
               $b = bus::SelctMatricule($ra->matricule );
               $nbr=$b->nbrPlace;
               echo"<li>Nombre Total De Place : " . $nbr . "</li>";
               $nombreReserver=randonnee::countParticipants($ra->idRandonnee);
               echo"<li>Place Reserver: " . $nombreReserver . "</li>";
               
               if($ra->date_debut> $DateCurrent ){// si l'etat en attend if($ra->etat==0){
               
                echo"<li>Etat de la randonnée :En attend</li>";
                echo"<li>NB :On peux changer la date de fin de randonnée</li>"; 
                //echo "<li><a href='../../Controller/ControlReserver.php?id=" .  $idRandonnee. "' 
                 //onclick=\"return confirm('Êtes-vous sûr de vouloir reserver cet randonnée ?')\">reserver</a></li>";
                 echo "<li><a href='../../Controller/ControlReserver.php?id=" .  $idRandonnee. "'  onclick=\"return confirm('Êtes-vous sûr de vouloir réserver cette randonnée ?')\" style='background-color: #1b9bff; display: inline-block; padding: 10px; border-radius: 5px;'>Réserver</a></li>";

            }
            if($ra->date_debut<=  $DateCurrent && $ra->date_fin >= $DateCurrent){
                //if($ra->etat==1){
                    echo"<li>Etat de la randonnée :En cours</li>";
               }
               if( $ra->date_fin<$DateCurrent){
                  //if($ra->etat==2){
                    echo "La randonnée est finalisée.";
                    //echo"<li>Etat de la randonnée :Finalisé</li>";
                    }
               
                   
?>


                </ul>
            </div>
    </section>
<?php






/*
session_start();

    
$login = $_SESSION["user"];
if (isset($_GET['id'])) {
    // Inclut le fichier de connexion à la base de données et la classe Randonnee
    include("../../Model/randonnee.php");
    
    // Récupère l'ID de la randonnée depuis l'URL
    $idRandonnee = $_GET['id'];
    
    // Appelle une méthode pour obtenir la randonnée avec cet ID
    $ra= randonnee::getRandonneeById($idRandonnee);

    // Vérifie si la randonnée existe
  
        // Affiche l'ID de la randonnée
        echo $ra->ville;
        
							 include("../../Model/Utilisateur.php");
                             $a=utilisateur::SelctCin($login);
                             echo $a->cin;

                             echo "<td><a href='../../Controller/ControlReserver.php?id=" .  $idRandonnee. "' class='btn btn-danger' onclick=\"return confirm('Êtes-vous sûr de vouloir reserver cet article ?')\">reserver</a></td>";


     
}
*/
?>


</body>
</html>
