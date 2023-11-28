<?php
    include "../../../Controller/DonC.php";
?>
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
        <style>
            input::placeholder{
                text-align: center;
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
                                <a class="nav-link" href="products.php">Charities</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq.html">FAQs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" style="position:relative;left:220px;" href="affichage.php">Your Donations</a>
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
                <div class="container" style="font-family:'Inter', sans-serif;">
                        <?php
                            if(isset($_GET["id"])){
                                if(!empty($_GET["id"])){
                                    $c=new DonC();
                                    $tab=$c->searchdon($_GET["id"]);
                                    echo("
                                        <form align='center'>
                                            <input type='text' name='id' placeholder='Id' style='border-radius: 15px; border: solid grey;'>
                                            &nbsp
                                            <button type='submit' style='border-radius: 15px;border:solid grey;color:grey;'>search</button>
                                        </form>
                                        &nbsp
                                        <table width='70%' align='center'>
                                            <tr style='text-align: center;'>
                                                <td scope='col'>id</td>
                                                <td scope='col'>Full Name</td>
                                                <td scope='col'>Amount</td>
                                                <td scope='col'>Message</td>
                                            </tr>
                                        ");
                                    foreach($tab as $don){
                                        echo("          
                                     <tr style='text-align: center;' bgcolor='#D3D3D3'>
                                        <td scope='row' style='border-bottom: 1px solid black;'>".$don['id_user']."</td>
                                        <td style='white-space: nowrap;border-bottom: 1px solid black;'>".$don['fullname']."</td>
                                        <td style='border-bottom: 1px solid black;'>".$don['amount']."</td>
                                        <td style='border-bottom: 1px solid black;'>".$don['message']."</td>
                                    </tr>");
                                    }
                                    echo("</table>");
                                }
                                else{
                                    echo("
                                        <form align='center'>
                                            <input type='text' name='id' placeholder='Id' style='border-radius: 15px; border: solid grey;'>
                                            &nbsp
                                            <button type='submit' style='border-radius: 15px;border:solid grey;color:grey;'>search</button>
                                        </form>
                                        ");
                                }
                            }
                            else{
                                echo("
                                    <form align='center'>
                                        <input type='text' name='id' placeholder='Id' style='border-radius: 15px; border: solid grey;'>
                                        &nbsp
                                        <button type='submit' style='border-radius: 15px;border:solid grey;color:grey;'>search</button>
                                    </form>
                                    ");
                            }
                        ?>
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