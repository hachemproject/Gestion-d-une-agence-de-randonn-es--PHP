<?php
include("../Model/Utilisateur.php");

    $ciin = $_POST['ciin']; 
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $password = $_POST['pasword'];
    $confPassword = $_POST['confPassword'];
    $role = 0; 
    
    
    $enc_password = password_hash($password, PASSWORD_DEFAULT);


        if (isset($_FILES['img'])) {
        $imgFile = $_FILES['img']['name'];
        $tmp_dir = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];
          
         $upload_dir = '../vue/photos/'; 
            
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // Obtenir l'extension de l'image
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions)){   
                if($imgSize < 5000000) {
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else {
                    header ("location:../Vue/Authentification/regiister.php?errorIMG=ERROR:Sorry, your file is too large");
                }
            }
            else {
                header ("location:../Vue/Authentification/regiister.php?errorIMG=ERROR:Sorry, only JPG, JPEG, PNG & GIF files are allowed");
            }
 }
    if(!isset($errMSG)) {
        $SelectCin = Utilisateur::SelctCin($ciin);
        $SelectEmail = Utilisateur::SelctEmail($email);
        

        if($password===$confPassword ){
            if($SelectCin==true){
                header ("location:../Vue/Authentification/regiister.php?errorCIN=ERROR: CIN est deja trouve");
                //echo" CIN est deja trouver";
            }
                else {
                    if($SelectEmail==true){
                        header ("location:../Vue/Authentification/regiister.php?errorEMAIL=ERROR: EMAIL est deja trouver");
                        //echo" EMAIL est deja trouver";
                    }
                        else
                         {
                            $utilisateur = new Utilisateur($ciin, $userpic, $enc_password, $name, $prenom, $date, $email, $role);
                            $nb = Utilisateur::ajouter($utilisateur);
        
                          if ($nb > 0) {
                           //header ("location:../Vue/Authentification/login.php?error=invalide");
                          // header ("location:../Vue/Randonee/administration.php");
                          header ("location:../Vue/Authentification/regiister.php?Valid= Inscription Avec succée");
                        }else  echo"Utilisateur pas ajouté";

                          }
            }
        }else 
        header ("location:../Vue/Authentification/regiister.php?errorpasse=le mot de passe doit correpond le meme");
        //echo"le mot de passe doit correpond le meme";
        
 }
?>
