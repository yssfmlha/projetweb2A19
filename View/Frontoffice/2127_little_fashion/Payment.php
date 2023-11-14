<!DOCTYPE html>
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
                                <a class="nav-link" href="products.html">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq.html">FAQs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="contact.html">Donation</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                            <a href="product-detail.html" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>
            <section class="contact section-padding">
                <div class="container">
                    <div class="row">
                        <h4 class="mb-4" style="margin-left: 605px; height: 15px;">I<span>D:</span></h4>
                        <h5 class="mb-4" style="margin-left: 560px; height: 15px;"><?php echo($_GET["id"])?></h5>
                        <h4 class="mb-4" style="margin-left: 540px; height: 15px;"><span>FULL </span>NAME:</h4>
                        <h5 class="mb-4" style="margin-left: 530px; height: 15px;"><?php echo($_GET["name"])?></h5>
                        <h4 class="mb-4" style="margin-left: 580px; height: 15px;">Em<span>ail:</span></h4>
                        <h5 class="mb-4" style="margin-left: 460px; height: 15px;"><?php echo($_GET["email"])?></h5>
                        <h4 class="mb-4" style="margin-left: 560px; height: 15px;"><span>Amo</span>unt:</h4>
                        <h5 class="mb-4" style="margin-left: 603px; height: 15px;"><?php echo($_GET["amount"])?><span style="color: green;"> $</span></h5>
                        <h4 class="mb-4" style="margin-left: 490px; height: 15px;">Charity of <span>choice:</span></h4>
                        <h5 class="mb-4" style="margin-left: 570px; height: 15px;"><?php echo($_GET["charity"])?></h5>
                        <h4 class="mb-4" style="margin-left: 555px; height: 23px;"><span>Mess</span>age:</h4>
                            <div class="col-lg-6 col-12" style="margin-left: 320px;">
                                <form class="contact-form" role="form" id="form">
                                    <div class="form-floating mb-4">
                                        <textarea id="message" name="message" class="form-control" placeholder="Leave a message here" style="height: 160px; background-color: white;" disabled><?php echo($_GET["message"])?></textarea>
                                        <p style="position: relative;left: 650px; bottom: 63px;height: 0px;" id="messagecontrol"></p>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                            </div>
                        <h2 class="mb-4" style="margin-left: 420px;">Payment <span>Information</span></h2>
                        <div class="col-lg-6 col-12" style="margin-left: 320px;">
                            

                        <form class="contact-form" role="form" id="form" onsubmit="return controlsaisie()" action="index.html">
                                <div class="form-floating">
                                    <h5>Card <span style="color: rgb(255, 68, 0);">Number:</span></h5>
                                    <input type="text" name="cardnumber" id="cardnumber" class="form-control" onkeyup="numbercontrol()">
                                    <p style="position: relative;left: 660px; bottom: 63px;height: 0px;" id="numbercontrol"></p>
                                </div>
                                <div class="form-floating my-4">
                                    <h5><span style="color: rgb(255, 68, 0);">Expiration </span>Date:</h5>
                                    <input type="Date" name="date" id="date" class="form-control">
                                    <p style="position: relative;left: 660px; bottom: 63px;height: 0px;" id="datecontrol"></p>
                                </div>
                                <div class="form-floating">
                                    <h5>CV<span style="color: rgb(255, 68, 0);">V:</span></h5>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                &nbsp;
                                <div class="col-lg-5 col-6">
                                    <button type="submit" class="form-control" style="margin-left: 180px;">Donate</button>
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
        <script src="js/controlsaisiepayment.js"></script>
    </body>
</html>