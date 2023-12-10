<?php
    include "../../../Controller/projetsC.php";
    include "../../../Model/projets.php";
    $projetC=new projetsC();
    if(isset($_POST["id_startup"])&&isset($_POST["Nom_projet"])&&isset($_POST["Description_projet"])&&isset($_POST["Date_Debut"]) 
    &&isset($_POST["Date_Fin"])
    &&isset($_POST["Statut_Projet"])){
        
        if(!empty($_POST["id_startup"])&&!empty($_POST["Nom_projet"])&&!empty($_POST["Description_projet"])&&!empty($_POST["Date_Debut"])
        &&!empty($_POST["Date_Fin"]) &&!empty($_POST["Statut_Projet"])){
            $projet=new projets(NULL,$_POST["id_startup"],$_POST["Nom_projet"],
            $_POST["Description_projet"],$_POST["Date_Debut"],$_POST["Date_Fin"],$_POST["Statut_Projet"]);
            $projetC->addprojets($projet);
            header("Location:VotreStartup.php");
        }
    }
    ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's I need - don_Startup Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <script src="controle_saisie_projets.js"></script>
        
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
                        <strong><span>I</span> need</strong>
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
                                <span class="d-block text-primary">Create </span>
                                <span class="d-block text-dark">your project</span>
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
                            <h2 class="mb-4">Let's <span>begin</span></h2>

                            <form class="contact-form me-lg-5 pe-lg-3" role="form" onsubmit="return GAB();" method="POST">

                                <div class="form-floating">
                                <select name="id_startup" id="id_startup" class="form-control">
                                <?php
                                $projetC = new projetsC();
                                $startupOptions = $projetC->getStartupOptions();
                                foreach ($startupOptions as $startup) {
                                    echo "<option value='" . $startup["id_startup"] . "'>" . $startup["Nom"] . " (ID: " . $startup["id_startup"] . ")</option>";
                                }
                                ?>
                                </select>
                                <span id="0"></span>
                                <label for="id_startup">Nom du startup</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="text" name="Nom_projet" id="Nom_projet" class="form-control" placeholder="Nom_projet">
                                    <span id="1"></span>
                                    <label for="Nom_projet">Nom du projet</label>
                                </div>
                                
                                <div class="form-floating my-4">
                                    <textarea type="text" name="Description_projet" id="Description_projet"class="form-control" placeholder="Description_projet" style="height: 120px"></textarea>
                                    <span id="2"></span>
                                    <label for="Description_projet">Description du projet</label>
                                </div>

                                <div class="form-floating mb-4">
                                <input type="date" name="Date_Debut" id="Date_Debut"class="form-control" placeholder="Date_Debut">
                                <span id="3"></span>
                                    <label for="Date_Debut">Date debut du projet</label>
                                </div>

                                <div class="form-floating mb-4">
                                <input type="date" name="Date_Fin" id="Date_fin" class="form-control" placeholder="Date_Fin">
                                <span id="4"></span>
                                    <label for="Date_Fin">Date fin du projet</label>
                                </div>
                                <div class="form-floating mb-4">
                                <input type="text" name="Statut_Projet" id="Statut_Projet"class="form-control" placeholder="Statut_Projet">
                                <span id="5"></span>
                                    <label for="Statut_Projet">Statut du projet</label>
                                </div>
                                <div class="col-lg-5 col-6">
                                    <button type="submit" class="form-control">Enregistrer</button>
                                </div>
                            </form>
                        </div>

                                

                                

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">I</a>need</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>I need</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Don Startup</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Startup</a></li>
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