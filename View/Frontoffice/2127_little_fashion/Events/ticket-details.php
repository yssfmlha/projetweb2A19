<?php
require '../../../../Controller/EventC.php' ;
require '../../../../Controller/ParticipantC.php' ;
require '../../../../Model/Event.php' ;
require '../../../../Model/Participant.php' ;
require_once 'c:/xampp/htdocs/projet_web/phpqrcode/qrlib.php';
session_start();
$user_id = $_SESSION['user_id'];
function generateMultiLineQRCode($qrTextArray, $path)
{
    $qrCode = new QRcode();
    $qrText = implode("\n", $qrTextArray);
    $qrcodeImagePath = $path . time() . ".png";
    $qrCode->png($qrText, $qrcodeImagePath, 'H', 4, 4);
    return $qrcodeImagePath;
}
function getDayName($dateString) {
    try 
    {
        $date = new DateTime($dateString);
        return $date->format('l');
    }
    catch (Exception $e) 
    {
        return "Error: " . $e->getMessage();
    }
}
$c = new EventC () ;
$tab = $c->CherEvent_Mat($_GET['Matricule']);
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
foreach($tab as $Event )
{
    $Evt = new Event($_GET['Matricule'], $Event["Nom_Event"], $Event["Adresse_Event"], $Event["Date_Event"],$Event["DateF_Event"],$Event["About_Event"],
    $Event["Price_Event"], $Event["NBTKT_Event"] - $quantity );
}
$c->UpdEvent($Evt,$_GET['Matricule']);
$tab = $c->CherEvent_Mat($_GET['Matricule']);
$p= new ParticipantC();
$You = $p->listParticipant( $user_id , $_GET['Matricule'] );
if(!$You)
{
    $Prt = new Participant($user_id,$_GET['Matricule'],$quantity,date('Y-m-d H:i:s'),generateMultiLineQRCode(['Id Du Participant: '.$user_id , 'Id Evenement: '.$_GET['Matricule'] , 'Nombre Du Ticket Acheter: ' . $quantity], 'Qrimages/'));
    $p->AddParticipant($Prt) ;
}
else
{
    $p->UpdParticipant( $quantity , $user_id , $_GET['Matricule']);
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>ArtXibition Ticket Detail Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/slick.css"/>

    <link href="../../css/tooplate-little-fashion.css" rel="stylesheet">

    <!-- Additional CSS Files -->

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../../assets/css/tooplate-artxibition.css">
<!--

Tooplate 2125 ArtXibition

https://www.tooplate.com/view/2125-artxibition

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    <!-- ***** Pre HEader ***** -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="text-button">
                        <a href="rent-venue.html">Contact Us Now! <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
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
                                <a class="nav-link" href="../index.html">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../Produit/home.php">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../products.php">Charities</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../Votrestartup.php">Startup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="myindex.php">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../forum/index.php">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="position:relative;left:190px;" href="../affichage.php">Your Donations</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="../2127_little_fashion/login.php" class="bi-person custom-icon me-3"></a>

                            <a href="panier-event.php" class="bi-bag custom-icon"></a>
                        </div>
            </div>
        </div>
    </nav>
    <!-- ***** Header Area End ***** -->

    <!-- ***** About Us Page ***** -->
    <div class="page-heading-shows-events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tickets On Sale Now!</h2>
                    <span>Check out upcoming and past shows & events and grab your ticket right now.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="ticket-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-image">
                        <img src="../../assets/images/ticket-details.jpg" alt="">
                    </div>
                </div>
            <?php foreach($tab as $Event ){?>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4><?php echo $Event["Nom_Event"];?></h4>
                        <span><?php echo $Event["NBTKT_Event"];?> Tickets still available</span>
                        <ul>
                            <li><i class="fa fa-clock-o"></i> <?php echo getDayName($Event["Date_Event"]);?> to <?php echo getDayName($Event["DateF_Event"]);?></li>
                            <li><i class="fa fa-map-marker"></i><?php echo $Event["Adresse_Event"];?></li>
                        </ul>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Standard Ticket</h6>
                                <p>$<?php echo $Event["Price_Event"];?> per ticket</p>
                            </div>
                        <form method="POST" id="myForm">
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="<?php echo ($Event["NBTKT_Event"] < 10) ? $Event["NBTKT_Event"] : 10; ?>" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4>Total: </h4><h4 id="totalCost"><?php echo $Event["Price_Event"];?></h4>
                            <div class="main-dark-button"><a type="submit" href="#" onclick="submitForm('myForm');">Purchase Tickets</a></div>
                        </div>
                        </form>
                        <div class="warn">
                            <p>*You Can Only Buy 10 Tickets For This Show</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- *** Footer *** -->
    <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="myindex.php">Little</a> Fashion</h4>
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
    <script>
        $(document).ready(function() {
            $(document).on("input", ".qty", function() {
                updateTotalAmount();
            });
            $(document).on("click", ".plus, .minus", function() {
                updateTotalAmount();
            });
            updateTotalAmount();
        });
        function updateTotalAmount() {
            var pricePerTicket = <?php echo $Event["Price_Event"];?>;
            var maxQuantity = 10;
            var quantity = parseFloat($(".qty").val());
            quantity = Math.min(quantity, maxQuantity);
            $(".qty").val(quantity);
            var totalAmount = pricePerTicket * quantity;
            $("#totalCost").text(totalAmount.toFixed(2) + " $");
        }
        function submitForm(FormId) {
            document.getElementById(FormId).submit();
        }
    </script>
    <!-- jQuery -->
    <script src="../../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../../assets/js/scrollreveal.min.js"></script>
    <script src="../../assets/js/waypoints.min.js"></script>
    <script src="../../assets/js/jquery.counterup.min.js"></script>
    <script src="../../assets/js/imgfix.min.js"></script> 
    <script src="../../assets/js/mixitup.js"></script> 
    <script src="../../assets/js/accordions.js"></script>
    <script src="../../assets/js/owl-carousel.js"></script>
    <script src="../../assets/js/quantity.js"></script>
 <!-- Global Init -->
    <?php
        $debutDayEventDate = date('Y-m-d H:i:s', strtotime($c->CherEarliestEvent()['Date_Event']));
        $finDayEventDate = date('Y-m-d H:i:s', strtotime($c->CherEarliestEvent()['DateF_Event']));
    ?>
    <script>
        var debutDayEventDate = '<?php echo $debutDayEventDate; ?>';
        var finDayEventDate = '<?php echo $finDayEventDate; ?>';
    </script>
    <script src="../../assets/js/custom.js"></script>

  </body>
</html>
