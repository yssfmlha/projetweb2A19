<?php
include '../../../Controller/startupC.php' ;
include '../../../Controller/projetsC.php';
$startup = new startupC();
$latestStartup = $startup->getLatestStartup();
if ($latestStartup) {
    $projetsC = new projetsC();
    $projects = $projetsC->getProjectsByStartup($latestStartup["id_startup"]);
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
                        <strong><span>I</span>need</strong>
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
                                <a class="nav-link" href="about.html">Story</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="products.html">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="userstartup.php">Startup</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                            <a href="product-detail.html" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Votre</span>
                                <span class="d-block text-dark">startup et projets</span>
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
                            <h5><center>Votre Startup</center></h5>
<table border="2" align="center" width = "70%" >
    <tr>
    <th>id_startup</th>
    <th>Nom_startup</th>
    <th>Domaine</th>
    <th>Nom_fondateur</th>
    <th>Prénom_fondateur</th>
    <th>Description</th>
    <th>Email</th>
    <th>telephone</th>
    <th>Update </th>
    </tr>
    <?php if ($latestStartup) : ?>
                                <tr>
                                    <td><?php echo $latestStartup["id_startup"]; ?></td>
                                    <td><?php echo $latestStartup["Nom"]; ?></td>
                                    <td><?php echo $latestStartup["domaine"]; ?></td>
                                    <td><?php echo $latestStartup["nom_f"]; ?></td>
                                    <td><?php echo $latestStartup["prenom"]; ?></td>
                                    <td><?php echo $latestStartup["de"]; ?></td>
                                    <td><?php echo $latestStartup["email"]; ?></td>
                                    <td><?php echo $latestStartup["telephone"]; ?></td>
                                    <td><a href = "updatestartup.php?idd=<?php echo $latestStartup["id_startup"];?>&nom=<?php echo $latestStartup["Nom"]; ?>&domaine=<?php echo $latestStartup["domaine"]; ?>&nomf=<?php echo $latestStartup["nom_f"]; ?>&prenom=<?php echo $latestStartup["prenom"]; ?>&de=<?php echo $latestStartup["de"]; ?>&email=<?php echo $latestStartup["email"]; ?>&tel=<?php echo $latestStartup["telephone"]; ?>">Update</a></td>
                                </tr>
                            <?php endif; ?>
</table>
<h5><center>Vos projets</center></h5>
<table border="2" align="center" width = "70%">
<tr>
            <th>identifiant projet</th>
            <th>identifiant startup</th>
            <th>Nom du projet</th>
            <th>Description du projet</th>
            <th>Date de debut</th>
            <th>Date de fin</th>
            <th>Statut du projet</th>
            <th>Mise à jour</th>
            <th>Supprimer</th>
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
            <td><a href = "updateprojets.php?idd=<?php echo $project["id_projet"];?>&nom=<?php echo($project["Nom_projet"]);?>&desc=<?php echo($project["Description_Projet"]);?>&dated=<?php echo($project["Date_Debut"]);?>&datef=<?php echo($project["Date_Fin"]);?>&stat=<?php echo($project["Statut_Projet"]);?>">Update</a></td>
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
                            <a href="userprojets.php" class="button">Ajouter un projet</a>
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





































