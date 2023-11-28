<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion - Contact Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

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
                                <a class="nav-link" href="about.html">Story</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="products.php">Charities</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq.html">FAQs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="position:relative;left:220px;" href="affichage.php">Your Donations</a>
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
                                <span class="d-block text-primary">Donate to a charity</span>
                                <span class="d-block text-dark">Heal the world</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <img src="images/people-carrying-donation-charity-related-icons_53876-43091.avif" class="header-image img-fluid" alt="">
            </header>

            <section class="contact section-padding">
                <div class="container">
                    <div class="row">
                        <h2 class="mb-4">Let's <span>Donate to <?php echo($_GET["namec"])?>:</span></h2>
                        <div class="col-lg-6 col-12" style="margin-left: 320px;">
                            
                            <form class="contact-form" role="form" id="form" onsubmit="return saisie()" action="Payment.php">
                                <input type="hidden" value="<?php echo($_GET["idc"])?>" name="idc">
                                <input type="hidden" value="<?php echo($_GET["namec"])?>" name="namec">
                                <div class="form-floating">
                                    <input type="text" name="id" id="id" class="form-control" placeholder="ID" onkeyup="idcontrol()">
                                    <p style="position: relative;left: 650px; bottom: 63px;height: 0px;" id="idcontrol"></p>
                                    <label for="id">ID</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" onkeyup="namecontrol()">
                                    <p style="position: relative;left: 650px; bottom: 63px;height: 0px;" id="namecontrol"></p>
                                    <label for="name">Full name</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email address" onkeyup="emailcontrol()">
                                    <p style="position: relative;left: 650px; bottom: 63px;height: 0px;" id="emailcontrol"></p>
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating my-4">
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" onkeyup="amountcontrol()">
                                    <p style="position: relative;left: 650px; bottom: 63px;height: 0px;" id="amountcontrol"></p>
                                    <label for="email">Amount(in Dollars $)</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea id="message" name="message" class="form-control" placeholder="Leave a comment here" style="height: 160px" onkeyup="messagecontrol()"></textarea>
                                    <p style="position: relative;left: 650px; bottom: 63px;height: 0px;" id="messagecontrol"></p>
                                    <label for="message">Message</label>
                                </div>

                                <div class="col-lg-5 col-6">
                                    <button type="submit" class="form-control" style="margin-left: 180px;" id="but">Proceed to Payment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">i</a> Need</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>I Need</strong></p>
                        <br>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Donation</a></li>
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
        <script src="js/controlsaisie.js"></script>
    </body>
</html>