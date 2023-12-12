<?php
include '../../../Controller/startupC.php' ;
include '../../../Controller/projetsC.php';
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: 2127_little_fashion/login.php");
}
$startup = new startupC();
$latestStartup = $startup->SearchStartupByUser($_SESSION["user_id"]);
if(!isset($latestStartup)||empty($latestStartup)){
    header("Location: userstartup.php");
}
if ($latestStartup) {
    $projetsC = new projetsC();
    $projects = $projetsC->getProjectsByStartup($latestStartup[0]["id_startup"]);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's I need - Startup Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="table.css">  

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">

        
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                        <strong>i<span>Need</span></strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="Produit/home.php">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="products.php">Charities</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="Votrestartup.php">Startup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Events/myindex.php">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="forum/index.php">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="position:relative;left:200px;" href="affichage.php">Your Donations</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="2127_little_fashion/login.php" class="bi-person custom-icon me-3"></a>

                            <a href="Produit/home.php" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Your Startups</span>
                                <span class="d-block text-dark">and Projects</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <img src="images/header/positive-european-woman-has-break-after-work.jpg" class="header-image img-fluid" alt="">
            </header>

            <section class="contact section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-6 col-12">
                            <h5><center>Your startup</center></h5>
<table border="2" align="center" width = "70%" >
    <tr>
    <th>Startup Id</th>
    <th>Startup name</th>
    <th>Domain</th>
    <th>Founder name</th>
    <th>Founder last name</th>
    <th>Description</th>
    <th>Email</th>
    <th>Phone number</th>
    <th>Update</th>
    </tr>
    <?php if ($latestStartup) : ?>
                                <tr>
                                    <td><?php echo $latestStartup[0]["id_startup"]; ?></td>
                                    <td><?php echo $latestStartup[0]["Nom"]; ?></td>
                                    <td><?php echo $latestStartup[0]["domaine"]; ?></td>
                                    <td><?php echo $latestStartup[0]["nom_f"]; ?></td>
                                    <td><?php echo $latestStartup[0]["prenom"]; ?></td>
                                    <td><?php echo $latestStartup[0]["de"]; ?></td>
                                    <td><?php echo $latestStartup[0]["email"]; ?></td>
                                    <td><?php echo $latestStartup[0]["telephone"]; ?></td>
                                    <td><a href = "updatestartup.php?idd=<?php echo $latestStartup[0]["id_startup"];?>&nom=<?php echo $latestStartup[0]["Nom"]; ?>&domaine=<?php echo $latestStartup[0]["domaine"]; ?>&nomf=<?php echo $latestStartup[0]["nom_f"]; ?>&prenom=<?php echo $latestStartup[0]["prenom"]; ?>&de=<?php echo $latestStartup[0]["de"]; ?>&email=<?php echo $latestStartup[0]["email"]; ?>&tel=<?php echo $latestStartup[0]["telephone"]; ?>">Update</a></td>
                                </tr>
                            <?php endif; ?>
</table>
<h5><center>Your projects</center></h5>
<table border="2" align="center" width = "70%">
<tr>
            <th>Project Id</th>
            <th>Startup Id</th>
            <th>Project name</th>
            <th>Project Description</th>
            <th>Begin Date</th>
            <th>End Date</th>
            <th>Project status</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php if (!empty($projects)) : ?>
            <?php foreach ($projects as $project) : ?>
            <tr>
            <td><?php echo $project["id_projet"];?></td>
            <td><?php echo $project["id_startup"];?></td>
            <td><?php echo $project["Nom_projet"];?></td>
            <td><?php echo $project["Description_Projet"];?></td>
            <td><?php echo $project["Date_Debut"];?></td>
            <td><?php echo $project["Date_Fin"];?></td>
            <td><?php echo $project["Statut_Projet"];?></td>
            <td><a href = "updateprojets.php?ids=<?php echo $latestStartup[0]["id_startup"];?>&idd=<?php echo $project["id_projet"];?>&nom=<?php echo($project["Nom_projet"]);?>&desc=<?php echo($project["Description_Projet"]);?>&dated=<?php echo($project["Date_Debut"]);?>&datef=<?php echo($project["Date_Fin"]);?>&stat=<?php echo($project["Statut_Projet"]);?>">Update</a></td>
            <td><a href = "deleteprojets.php?idd=<?php echo $project["id_projet"];?>">Delete</a></td>
            </tr>
    <?php endforeach;?>
    <?php else : ?>
                                <tr>
                                    <td colspan="6">Aucun projet trouvé.</td>
                                </tr>
                            <?php endif; ?>
</table>

                            </div>
                            <a href="userprojets.php?ids=<?php echo $latestStartup[0]["id_startup"]; ?>" class="button">Ajouter un projet</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">I </a>need</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2023 <strong>I need</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">I need</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>





































