<?php
    require "../../../Controller/startupC.php";
    require "../../../Model/startup.php";
    $startupC=new startupC();
    session_start();
    if(isset($_POST["Nom1"])&&isset($_POST["domaine1"])&&isset($_POST["nom_f1"])&&isset($_POST["prenom_f1"]) &&isset($_POST["description1"])
    &&isset($_POST["email1"])  &&isset($_POST["tel1"]) ){
        if(!empty($_POST["Nom1"])&&!empty($_POST["domaine1"])&&!empty($_POST["nom_f1"])&&!empty($_POST["prenom_f1"])
        &&!empty($_POST["description1"]) &&!empty($_POST["email1"])&&!empty($_POST["tel1"])){

            $startup=new startup(NULL,$_SESSION["user_id"],$_POST["Nom1"],$_POST["domaine1"],
            $_POST["nom_f1"],$_POST["prenom_f1"],$_POST["description1"],$_POST["email1"],$_POST["tel1"]);
            $startupC->updatestartup($startup,$_GET['idd']);
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

        <title>Tooplate's I need - Startup Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <script src="controle_saisie_startup.js"></script>
        
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
                            <h2 class="mb-4">Update <span>Your Startup</span></h2>

                            <form class="contact-form me-lg-5 pe-lg-3" role="form" method="POST" onsubmit="return ISR();">

                                <div class="form-floating">
                                    <input type="text" name="Nom1" id="Nom" class="form-control" placeholder="Startup name" value="<?php echo $_GET["nom"]; ?>">
                                    <span id="1"></span>
                                    <label for="Nom1">Startup name</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="text" name="domaine1" id="domaine"class="form-control" placeholder="Domain" value="<?php echo $_GET["domaine"]; ?>">
                                    <span id="2"></span>
                                    <label for="domaine1">Domain</label>
                                </div>
                                
                                <div class="form-floating my-4">
                                    <input type="text" name="nom_f1" id="nom_f"class="form-control" placeholder="Founder's firstname" value="<?php echo $_GET["nomf"]; ?>">
                                    <span id="3"></span>
                                    <label for="nom_f1">Founder's firstname</label>
                                </div>

                                <div class="form-floating mb-4">
                                <input type="text" name="prenom_f1" id="prenom_f"class="form-control" placeholder="Founder's lastname" value="<?php echo $_GET["prenom"]; ?>">
                                <span id="4"></span>
                                    <label for="prenom_f1">Founder's lastname</label>
                                </div>
                                <div class="form-floating mb-4">
                                <textarea id="description" name="description1" class="form-control" placeholder="Startup description"style="height: 120px"><?php echo $_GET["de"]; ?></textarea>
                                <span id="5"></span>
                                <label for="description1">Startup description</label>
                                </div>
                                <div class="form-floating my-4">
                                    <input type="text" name="email1" id="email"class="form-control" placeholder="Email" value="<?php echo $_GET["email"]; ?>">
                                    <span id="6"></span>
                                    <label for="email1">Email</label>
                                </div>
                                <div class="form-floating my-4">
                                    <input type="text" name="tel1" id="tel"class="form-control" placeholder="Phone number" value="<?php echo $_GET["tel"]; ?>">
                                    <span id="7"></span>
                                    <label for="tel1">Phone number</label>
                                </div>
                                <div class="col-lg-5 col-6">
    <button type="submit" class="form-control">Save</button>

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
                        <h4 class="text-white mb-3"><a href="index.html">I</a> need</h4>
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