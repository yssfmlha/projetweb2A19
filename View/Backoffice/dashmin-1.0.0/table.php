<?php
    include "../../../Controller/DonC.php";
    include "c:/xampp/htdocs/projet_web/Controller/userC.php";
    session_start();
    $user=$_SESSION["user_id"];
    $object=new UserC();
    $info=$object->listuser($user);
    echo($user);
    $c=new DonC();
    $tab=$c->listdon();
?>
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
                        <img class="rounded-circle" src="user/uploaded_img/<?php echo($info[0]['image']);?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo($info[0]["name"]);?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <a href="../index.php" class="nav-item nav-link"><i class="fa fa-chart-pie me-2"></i>Statistics</a>
                <a href="forum/tables.php" class="nav-item nav-link"><i class="fa fa-underline me-2"></i>Forum</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Events</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Events/BackEvent.php" class="dropdown-item">Events</a>
                            <a href="Events/BackParticipant.php" class="dropdown-item">Participations</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="produit/listproduit.php" class="dropdown-item">Products</a>
                            <a href="produit/listcategorie.php" class="dropdown-item">Categories</a>
                        </div>
                    </div>
                    <a href="table.php" class="nav-item nav-link active"><i class="fa fa-gift me-2"></i>Donations</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-hand-holding-heart me-2"></i>Charity</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Charity.php" class="dropdown-item">Charities</a>
                            <a href="form.php" class="dropdown-item">Add a Charity</a>
                        </div>
                    </div>
                    <a href="user/table.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Users</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Startup</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="admin_startup.php" class="dropdown-item">Nos Startups</a>
                            <a href="adminprojets.php" class="dropdown-item">Projets</a>
                            <a href="statistiques.php" class="dropdown-item">Statistiques</a>
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
                            <img class="rounded-circle me-lg-2" src="user/uploaded_img/<?php echo($info[0]['image']);?>" alt="" style="width: 40px; height: 40px;">
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


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4" style="width: 1000px;">
                            <h6 class="mb-4">Donations</h6>
                            <h6 style="margin-left:690px;position:relative;bottom:43px;height:0px;">Filter By:</h6>
                            <form id="form" method="GET" style="height:0px;">
                            <select name="filter" onchange="submitForm()" style="border-radius:5px;margin-left:760px;position:relative;bottom:55px;color:grey;">
                                <option value="" disabled <?php if(empty($_GET["filter"])){?>selected<?php }?>>------------------</option>
                                <option value="charity" <?php if(isset($_GET["filter"])){if(!empty($_GET["filter"])){if($_GET["filter"]=="charity"){?>selected<?php }}}?>>Charity</option>
                                <option value="amount" <?php if(isset($_GET["filter"])){if(!empty($_GET["filter"])){if($_GET["filter"]=="amount"){?>selected<?php }}}?>>Amount</option>
                                <option value="name" <?php if(isset($_GET["filter"])){if(!empty($_GET["filter"])){if($_GET["filter"]=="name"){?>selected<?php }}}?>>Name</option>
                            </select>
                            <button class="btn btn-primary mb-4" style="margin-left:870px;position:relative;bottom:82px;width:100px;padding:0;"><a href="table.php" style='text-decoration: none;color: white;'>No Filter</a></button>
                            <?php if(isset($_GET["filter"])){if(!empty($_GET["filter"])){if($_GET["filter"]=="charity"||$_GET["filter"]=="name"){?>
                            <p for="search" style="margin-left:700px;position:relative;bottom:100px;color:black;"><b>Search:</b></p>
                            <input type="text" id="search" name="search" style="margin-left:760px;position:relative;bottom:140px;width:100px;border-radius:5px;border-color:grey;color:grey;height:25px;">
                            <button type="submit"class="btn btn-primary mb-4" style="margin-left:870px;position:relative;bottom:165px;width:100px;padding:0;">Search</button>
                            <?php }}}?>
                            </form>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php
                                        if(isset($_GET["filter"])){
                                            if(!empty($_GET["filter"])){
                                                if($_GET["filter"]=="charity"){
                                                    echo("
                                                        <th scope='col'>Deletion</th>
                                                        <th scope='col'>Charité</th>
                                                        <th scope='col'>Full Name</th>
                                                        <th scope='col'>Amount</th>
                                                        <th scope='col'>Message</th>
                                                    ");
                                                }
                                                elseif($_GET["filter"]=="amount"){
                                                    echo("
                                                        <th scope='col'>Deletion</th>
                                                        <th scope='col'>Amount</th>
                                                        <th scope='col'>Full Name</th>
                                                        <th scope='col'>Message</th>
                                                        <th scope='col'>Charité</th>
                                                    ");  
                                                }
                                                elseif($_GET["filter"]=="name"){
                                                    echo("
                                                        <th scope='col'>Deletion</th>
                                                        <th scope='col'>Full Name</th>
                                                        <th scope='col'>Full Name</th>
                                                        <th scope='col'>Amount</th>
                                                        <th scope='col'>Message</th>
                                                        <th scope='col'>Charité</th>
                                                    ");  
                                                }
                                            }
                                        }
                                        else{
                                            echo("
                                            <th scope='col'>Deletion</th>
                                            <th scope='col'>Full Name</th>
                                            <th scope='col'>Amount</th>
                                            <th scope='col'>Message</th>
                                            <th scope='col'>Charité</th>
                                        ");
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET["filter"])){
                                            if(!empty($_GET["filter"])){
                                                if($_GET["filter"]=="charity"){
                                                    if(isset($_GET["search"])&&!empty($_GET["search"])){
                                                        $tabCharite=$c->searchdonByCharity($_GET["search"]);
                                                        foreach($tabCharite as $don){
                                                            echo("             
                                                        <tr>
                                                            <th scope='row'><a href='Delete.php?id=".$don['id_don']."'>Delete</a></th>
                                                            <td><a href='charity.php?id= ".$don['id_charite']."'>".$don['nom_charite']."</a></td>
                                                            
                                                            <td style='white-space: nowrap;'><a href='Changenom.php?id=".$don['id_user']."&oldnom=".$don['fullname']."'>".$don['fullname']."</a></td>
                                                            <td>".$don['amount']."</td>
                                                            <td><a href='Changemsg.php?id=".$don['id_user']."&oldmsg=".$don['message']."'>".$don['message']."</a></td>
                                                        </tr>");
                                                        }
                                                    }
                                                    else{
                                                        $tabCharite=$c->listdonOrderbyCharite();
                                                        foreach($tabCharite as $don){
                                                            echo("             
                                                        <tr>
                                                            <th scope='row'><a href='Delete.php?id=".$don['id_don']."'>Delete</a></th>
                                                            <td><a href='charity.php?id= ".$don['id_charite']."'>".$don['nom_charite']."</a></td>
                                                            
                                                            <td style='white-space: nowrap;'><a href='Changenom.php?id=".$don['id_user']."&oldnom=".$don['fullname']."'>".$don['fullname']."</a></td>
                                                            <td>".$don['amount']."</td>
                                                            <td><a href='Changemsg.php?id=".$don['id_user']."&oldmsg=".$don['message']."'>".$don['message']."</a></td>
                                                        </tr>");
                                                        }
                                                    }
                                                }
                                                elseif($_GET["filter"]=="amount"){
                                                    $tabAmount=$c->listdonOrderbyAmount();
                                                    foreach($tabAmount as $don){
                                                        echo("             
                                                    <tr>
                                                        <th scope='row'><a href='Delete.php?id=".$don['id_don']."'>Delete</a></th>
                                                        <td>".$don['amount']."</td>
                                                        
                                                        <td style='white-space: nowrap;'><a href='Changenom.php?id=".$don['id_user']."&oldnom=".$don['fullname']."'>".$don['fullname']."</a></td>
                                                        <td><a href='Changemsg.php?id=".$don['id_user']."&oldmsg=".$don['message']."'>".$don['message']."</a></td>
                                                        <td><a href='charity.php?id= ".$don['id_charite']."'>".$don['nom_charite']."</a></td>
                                                    </tr>");
                                                    }
                                                }
                                                elseif($_GET["filter"]=="name"){
                                                    if(isset($_GET["search"])&&!empty($_GET["search"])){
                                                        $tabName=$c->searchdonByName($_GET["search"]);
                                                        foreach($tabName as $don){
                                                            echo("             
                                                        <tr>
                                                            <th scope='row'><a href='Delete.php?id=".$don['id_don']."'>Delete</a></th>
                                                            <td style='white-space: nowrap;'><a href='Changenom.php?id=".$don['id_user']."&oldnom=".$don['fullname']."'>".$don['fullname']."</a></td>
                                                            
                                                            <td>".$don['amount']."</td>
                                                            <td><a href='Changemsg.php?id=".$don['id_user']."&oldmsg=".$don['message']."'>".$don['message']."</a></td>
                                                            <td><a href='charity.php?id= ".$don['id_charite']."'>".$don['nom_charite']."</a></td>
                                                        </tr>");
                                                        }
                                                    }
                                                    else{
                                                        $tabName=$c->listdonOrderbyName();
                                                        foreach($tabName as $don){
                                                            echo("             
                                                        <tr>
                                                            <th scope='row'><a href='Delete.php?id=".$don['id_don']."'>Delete</a></th>
                                                            <td style='white-space: nowrap;'><a href='Changenom.php?id=".$don['id_user']."&oldnom=".$don['fullname']."'>".$don['fullname']."</a></td>
                                                            
                                                            <td>".$don['amount']."</td>
                                                            <td><a href='Changemsg.php?id=".$don['id_user']."&oldmsg=".$don['message']."'>".$don['message']."</a></td>
                                                            <td><a href='charity.php?id= ".$don['id_charite']."'>".$don['nom_charite']."</a></td>
                                                        </tr>");
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        else{
                                            foreach($tab as $don){
                                                echo("             
                                            <tr>
                                                <th scope='row'><a href='Delete.php?id=".$don['id_don']."'>Delete</a></th>
                                                
                                                <td style='white-space: nowrap;'><a href='Changenom.php?id=".$don['id_user']."&oldnom=".$don['fullname']."'>".$don['fullname']."</a></td>
                                                <td>".$don['amount']."</td>
                                                <td><a href='Changemsg.php?id=".$don['id_user']."&oldmsg=".$don['message']."'>".$don['message']."</a></td>
                                                <td><a href='charity.php?id= ".$don['id_charite']."'>".$don['nom_charite']."</a></td>
                                            </tr>");
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">i Need</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
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