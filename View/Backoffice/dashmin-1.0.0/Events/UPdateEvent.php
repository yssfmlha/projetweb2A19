<?php
include '../../../../Controller/EventC.php' ;

include '../../../../Model/Event.php';
include "c:/xampp/htdocs/projet_web/Controller/userC.php";
session_start();
$user=$_SESSION["user_id"];
$object=new UserC();
$info=$object->listuser($user);
$Evt= new EventC() ;
$tab = $Evt->listEvents() ;
foreach($tab as $Evenement )
{
    if($Evenement['Mat_Event'] == $_GET['Matricule'])
    {
        break;
    }
}
if(isset($_POST['Mat']) || isset($_POST['Nom']) || isset($_POST['Adresse']) || isset($_POST['Prix']) || isset($_POST['NBTKT']) 
    || isset($_POST['Date']) || isset($_POST['Datef']) || isset($_POST['About']))
    {
        if(!empty($_POST['Mat']) && !empty($_POST['Nom']) && !empty($_POST['Adresse']) && !empty($_POST['Prix']) && !empty($_POST['NBTKT'])
            && !empty($_POST['Date']) && !empty($_POST['Datef']) && !empty($_POST['About']))
        {
            $Event = new Event($_POST['Mat'], $_POST['Nom'], $_POST['Adresse'], $_POST['Date'],$_POST['Datef'] ,$_POST['About'],
            $_POST['Prix'], $_POST['NBTKT'] );
            $Evt->UpdEvent($Event,$_GET['Matricule']);
            header("Location:BackEvent.php");
        }
    }
?>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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

     <!-- My Js -->
     <script src="Event.js"></script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>iNeed</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../user/uploaded_img/<?php echo($info[0]['image']);?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo($info[0]["name"]);?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <a href="../index.php" class="nav-item nav-link"><i class="fa fa-chart-pie me-2"></i>Statistics</a>
                <a href="../forum/tables.php" class="nav-item nav-link"><i class="fa fa-underline me-2"></i>Forum</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Events</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../Events/BackEvent.php" class="dropdown-item active">Events</a>
                            <a href="../Events/BackParticipant.php" class="dropdown-item">Participations</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../produit/listproduit.php" class="dropdown-item">Products</a>
                            <a href="../produit/listcategorie.php" class="dropdown-item">Categories</a>
                        </div>
                    </div>
                    <a href="../table.php" class="nav-item nav-link"><i class="fa fa-gift me-2"></i>Donations</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-hand-holding-heart me-2"></i>Charity</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../Charity.php" class="dropdown-item">Charities</a>
                            <a href="../form.php" class="dropdown-item">Add a Charity</a>
                        </div>
                    </div>
                    <a href="../user/table.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Users</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Startup</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="../admin_startup.php" class="dropdown-item">Nos Startups</a>
                            <a href="../adminprojets.php" class="dropdown-item">Projets</a>
                            <a href="../statistiques.php" class="dropdown-item">Statistiques</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../user/uploaded_img/<?php echo($info[0]['image']);?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo($info[0]["name"]);?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Chart Start -->
            <form method="POST" onsubmit="ValiderAdd();">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Ajout d'Evenement</h3>
                            </a>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Matricule"  name="Mat" placeholder="Matricule Evenement" value="<?php echo $Evenement['Mat_Event']; ?>">
                            <label for="floatingInput">Matricule Evenement</label>
                            <h6 id="resultatMessage" style="color : red ; font-size: 12px;"></h6>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom Evenement" value="<?php echo $Evenement['Nom_Event']; ?>">
                            <label for="floatingPassword">Nom Evenement</label>
                            <td><h6 id="validationMessage" style="color : red ; font-size: 12px;"></h6></td>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Adresse"  name="Adresse" placeholder="Adresse Evenement" value="<?php echo $Evenement['Adresse_Event']; ?>">
                            <label for="floatingInput">Adresse Evenement</label>
                            <h6 id="validationMessage1" style="color : red ; font-size: 12px;"></h6>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="date" class="form-control" id="Dated" name="Date" placeholder="Date debut d'Evenement" value="<?php echo $Evenement['Date_Event']; ?>">
                            <label for="floatingPassword">Date debut d'Evenement</label>
                            <h6 id="validationMessage2" style="color : red ; font-size: 12px;"></h6>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Datef"  name="Datef" placeholder="Date fin d'Evenement" value="<?php echo $Evenement['DateF_Event']; ?>">
                            <label for="floatingInput">Date fin d'Evenement</label>
                            <h6 id="validationMessage3" style="color : red ; font-size: 12px;"></h6>
                        </div>
                        <div class="form-floating mb-4">
                            <div class="input-group">
                                <span class="input-group-text">Commentaire</span>
                                <textarea class="form-control" aria-label="With textarea" id="About" name="About"><?php echo $Evenement['About_Event']; ?></textarea>
                            </div>
                            <h6 id="validationMessage4" style="color : red ; font-size: 12px;"></h6>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="Prix"  name="Prix" value="<?php echo $Evenement['Price_Event']; ?>"> 
                                <span class="input-group-text">.00</span>
                            </div>
                            <h6 id="validationMessage5" style="color : red ; font-size: 12px;"></h6>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="NBTKT" name="NBTKT" placeholder="NBTKT" value="<?php echo $Evenement['NBTKT_Event']; ?>">
                            <label for="floatingPassword">N° Ticket Evenement</label>
                            <h6 id="validationMessage6" style="color : red ; font-size: 12px;"></h6>
                        </div>
                        <input type="submit" value="Save" class="btn btn-primary py-3 w-100 mb-4">
                        <input type="reset" value="Annuler" class="btn btn-primary py-3 w-100 mb-4" onclick="window.location.href='BackEvent.php';" > 
                    </div>
            </form>
            <!-- Chart End -->
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
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