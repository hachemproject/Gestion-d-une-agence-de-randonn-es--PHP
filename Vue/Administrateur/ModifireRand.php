<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>lorigine</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<?php
session_start();
$login = $_SESSION["user"];
?>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <?php
                    include("../../Model/Utilisateur.php");
                    $a=utilisateur::SelctCin($login);
                    echo"<div class='d-flex align-items-center ms-4 mb-4'>";
                    echo" <div class='position-relative'>";

                  echo" <img class='rounded-circle' src='../photos/" . $a->image. "' alt='' style='width: 40px; height: 40px;'>";
                  echo" <div class='bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1'>";
                  echo"    </div>";
                  echo"  </div>";

                    
                    echo"<div class='ms-3'>";
                    echo" <h6 class='mb-0'>" . $a->nom . "</h6>";
                    echo" <span>Admin</span>";
                    echo"</div>";
                    ?>
                </div>
                <div class="navbar-nav w-100">
                    <a href="Administration.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                   
                    <a href="Randonee.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Les Randonnées</a>
                    <a href="LesUtilisateurs.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Les Utilisateurs</a>
                    <a href="AjoutRandon.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Ajouter Randonée</a>
                    <a href="RandEnAttend.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Randonnées En Attente</a>
                    <a href="RandEnCours.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Randonnées En Cours</a>
                    <a href="RandFinal.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Randonnées Finalisée</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
      

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                <!--                 <input class="form-control bg-dark border-0" type="search" placeholder="Search">-->   
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                           
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                               
                            </a>
                            <hr class="dropdown-divider">
                        </div>
                    </div>
                   
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- Navbar End -->
            
            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4" center>
                <div class="d-flex justify-content-center align-items-center">
                    
                    
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                        <form action="../../Controller/ControlModfiRand.php"  method="get">                        <h6 class="mb-4">Floating Label</h6>
<?php
/*  
if (isset($_GET['a'])) {
    $a = $_GET['a'];
    echo $a;
    // Faites quelque chose avec la valeur de $a
}
*/
if (isset($_GET['id'])) {
    include("../../Model/randonnee.php");
    // Récupère l'ID de la randonnée depuis l'URL
    $idRandonnee = $_GET['id'];

    $ra= randonnee::getRandonneeById($idRandonnee);
    $DateCurrent = date('Y-m-d');

     
}

?>
                            <div class="form-floating mb-3">
                                <input name="id" type="text" class="form-control" placeholder="id" value="<?= $ra->idRandonnee ?>" required>
                                <label >ID Randonnée</label>
                            </div>
                            
                            <?php

    echo '<div class="form-floating mb-3">';
    echo '    <input name="objectif" type="text" class="form-control" placeholder="id" value="' . $ra->objectif . '" required>';
    echo '    <label>objectif</label>';
    echo '</div>';
    
    echo '<div class="form-floating mb-3">';
    echo '    <input name="ville" type="text" class="form-control" placeholder="id" value="' . $ra->ville . '" required>';
    echo '    <label>ville</label>';
    echo '</div>';
    
    echo '<div class="form-floating mb-3">';
    echo '    <input name="description" type="text" class="form-control" placeholder="id"value="' . $ra->description . '"  required>';
    echo '    <label>description</label>';
    echo '</div>';
    echo '<div class="form-floating mb-3">';
    echo '    <input name="commentaire" type="text" class="form-control" placeholder="id"value="' . $ra->commentaire . '"  required>';
    echo '    <label>commentaire</label>';
    echo '</div>';
    if ($ra->date_debut > $DateCurrent) {//si rand en attend
    echo '<div class="form-floating mb-3">';
    echo '    <input name="dateDeb" type="date" class="form-control" placeholder="id" value="' . $ra->date_debut . '" required>';
    echo '    <label>dateDeb</label>';
    echo '</div>';
    }
    if ($ra->date_debut > $DateCurrent || $ra->date_debut<=  $DateCurrent && $ra->date_fin  >= $DateCurrent) {//si rand en attend ou en cours
    echo '<div class="form-floating mb-3">';
    echo '    <input name="dateFin" type="date" class="form-control" placeholder="id" value="' . $ra->date_fin . '"  required>';
    echo '    <label>dateFin</label>';
    echo '</div>';
    }
    if ($ra->date_debut > $DateCurrent) {//si rand en attend
    echo '<div class="form-floating mb-3">';
    echo '    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="bus" required>';
    include '../../Model/bus.php';
    $buses = bus::getAllbus();
    foreach ($buses as $bus) {
        echo '<option value="' . $bus['matricule'] . '"></option>';
    }
    
    echo '    <label for="floatingSelect">Works with selects</label>';
    echo '</select>';
  }
    echo '</div>';
   

?>
                            <input type="submit" class="btn btn-warning m-2" value="Modifier">
                        </form>
                        </div>
                    </div>






            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>