<?php
require '../controller/categorieC.php';
$c = new categorieC();
$tab = $c->listcategorie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>I need</title>

    <!-- CSS FILES -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/slick.css"/>
    <link rel="stylesheet" href="../css/tooplate-little-fashion.css">
    <style>
        /* Add additional styling here */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        header.site-header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }

        section.products {
            padding: 50px 0;
        }

        .product-thumb {
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
        }

        .product-thumb:hover {
            transform: scale(1.05);
        }

        footer.site-footer {
            background-color: #black;
            color: #fff;
            padding: 60px 60;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff !important;
        }
    </style>
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
                        <strong><span>I</span> Need</strong>
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
                                <a class="nav-link active" href="products.html">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq.html">FAQs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                            <a href="product-detail.html" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">pour chaque produit vendu</span>
                                <span class="d-block text-dark">5 % vont aux personnes dans le besoin</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="products section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12">
                            <h2 class="mb-5">Categories</h2>
                        </div>
                        
                        <?php foreach ($tab as $categorie) {  ?>

<div class="col-lg-4 col-12 mb-3">
    <div class="product-thumb">
        <a href="products.php">
            <img src="../images/vet/clothing.webp" class="img-fluid product-image" alt="">
        </a>

        <div class="product-info d-flex">
            <div>
                <h5 class="product-title mb-0">
                    <a href="produit.php?categorie_ref=<?php echo ($categorie['Id_categorie'])?>" class="product-title-link"><?php echo $categorie['nom_categorie'];?></a>
                </h5>
            </div>
        </div>
    </div>
</div>

<?php }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
</head>

<body>

    

</body>

</html>

    
    

                        
            
        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">I</a> need</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Ineed</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Anis</a></p>
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
    </head>
    <!-- Rest of your HTML content remains unchanged -->

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/Headroom.js"></script>
    <script src="../js/jQuery.headroom.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>

