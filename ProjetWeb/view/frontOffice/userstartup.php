<?php
    require "../../controle/startupC.php";
    require "../../modele/startup.php";
    $startupC=new startupC();
    if(isset($_POST["Nom"])&&isset($_POST["domaine"])&&isset($_POST["nom_fon"])&&isset($_POST["prenom_fon"]) &&isset($_POST["description"])
    &&isset($_POST["email"])  &&isset($_POST["tel"]) ){
        if(!empty($_POST["Nom"])&&!empty($_POST["domaine"])&&!empty($_POST["nom_fon"])&&!empty($_POST["prenom_fon"])
        &&!empty($_POST["description"]) &&!empty($_POST["email"])&&!empty($_POST["tel"])){
            $startup=new startup(NULL,$_POST["Nom"],$_POST["domaine"],
            $_POST["nom_fon"],$_POST["prenom_fon"],$_POST["description"],$_POST["email"],$_POST["tel"]);
            $startupC->addstartup($startup);
            header("Location:liste.php");
            
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

        <title>Tooplate's I need - Startup Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <script src=controle_saisie.js></script>
        
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

                            <li class="nav-item">
                                <a class="nav-link" href="userdon_startup.php">don startup</a>
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
                                <span class="d-block text-primary">Create your</span>
                                <span class="d-block text-dark">startup with us</span>
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

                            <form class="contact-form me-lg-5 pe-lg-3" role="form">

                                <div class="form-floating">
                                    <input type="text" name="Nom" id="Nom" class="form-control" placeholder="Nom du startup">

                                    <label for="Nom startup">Nom startup</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="text" name="domaine" id="domaine"class="form-control" placeholder="Domaine" >

                                    <label for="Domaine">Domaine</label>
                                </div>
                                
                                <div class="form-floating my-4">
                                    <input type="text" name="nom_f" id="nom_f"class="form-control" placeholder="Nom du fondateur">

                                    <label for="Nom du fondateur">Nom du fondateur</label>
                                </div>

                                <div class="form-floating mb-4">
                                <input type="text" name="prenom_f" id="prenom_f"class="form-control" placeholder="Prenom du fondateur">

                                    <label for="Prenom du fondateur">Prenom du fondateur</label>
                                </div>
                                <div class="form-floating mb-4">
                                <textarea id="description" name="description" class="form-control" placeholder="description"style="height: 120px"></textarea>

                                <label for="message">Description de votre startup</label>
                                </div>
                                <div class="form-floating my-4">
                                    <input type="text" name="email" id="email"class="form-control" placeholder="Email">

                                    <label for="Email">Email</label>
                                </div>
                                <div class="form-floating my-4">
                                    <input type="text" name="tel" id="tel"class="form-control" placeholder="Numéro téléphone">

                                    <label for="Email">Numéro téléphone</label>
                                </div>
                                <div class="col-lg-5 col-6">
    <button type="submit" class="form-control">Send</button>
</div>
                            </div>
                            </form>
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
                        <h4 class="text-white mb-3"><a href="index.html">Little</a> Fashion</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
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