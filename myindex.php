<?php
include '../Controller/EventC.php' ;
function formatDate($inputDate) {//ask!!
    $dateTime = DateTime::createFromFormat('d/m/y', $inputDate);
    $formattedDate = $dateTime->format('M d, Y');
    return $formattedDate;
}
function getFormattedDate($inputDate)
{
    $dateTime = DateTime::createFromFormat('d/m/y', $inputDate);
    $formattedDate = $dateTime->format('l, F jS');
    return $formattedDate;
}
function getDayName($dateString) {
    $parts = explode("/", $dateString);
    $day = intval($parts[0]);
    $month = intval($parts[1]);
    $year = 2000 + intval($parts[2]);
    $timestamp = mktime(0, 0, 0, $month, $day, $year);
    $dayName = date("l", $timestamp);
    return $dayName;
}
$c = new EventC () ;
$tab = $c->listEvents();
$tab1 =  $c->listEvents();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Ineed</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/slick.css"/>

    <link href="../css/tooplate-little-fashion.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/tooplate-artxibition.css">
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

                    <a class="navbar-brand" href="myindex.php">
                        <strong><span>Little</span> Fashion</strong>
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
                                <a class="nav-link active" href="contact.html">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="sign-in.html" class="bi-person custom-icon me-3"></a>
                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">
        <div class="counter-content">
            <ul>
                <li>Days<span id="days"></span></li>
                <li>Hours<span id="hours"></span></li>
                <li>Minutes<span id="minutes"></span></li>
                <li>Seconds<span id="seconds"></span></li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="next-show">
                            <i class="fa fa-arrow-up"></i>
                            <span id="itsTime">Next Show</span>
                        </div>
                        <h6>Opening on <?php echo getFormattedDate($c->CherEarliestEvent()['Date_Event']) ;?></h6>
                        <h2>The Ineed Festival 2023</h2>
                        <div class="main-white-button">
                            <a href="ticket-details.php?Matricule=<?php echo $c->CherEarliestEvent()['Mat_Event'] ;?>">Purchase Tickets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- *** Owl Carousel Items ***-->
    <div class="show-events-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-show-events owl-carousel">
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-01.jpg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-02.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-03.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-04.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-01.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-02.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-03.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../assets/images/show-events-04.jpg" alt=""></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- *** Amazing Venus ***-->
    <div class="amazing-venues">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="left-content">
                        <h4>Three Amazing Venues for events</h4>
                        <p>ArtXibition Event Template is brought to you by Tooplate website and it included total 7 HTML pages. 
                        These are <a href="index.html">Homepage</a>, <a href="about.html">About</a>, 
                        <a href="rent-venue.html">Rent a venue</a>, <a href="shows-events.html">shows &amp; events</a>, 
                        <a href="event-details.html">event details</a>, <a href="tickets.html">tickets</a>, and <a href="ticket-details.html">ticket details</a>. 
                        You can feel free to modify any page as you like. If you have any question, please visit our <a href="https://www.tooplate.com/contact" target="_blank">Contact page</a>.</p>
                        <br>
                        <p>You can use this event template for your commercial or business website. You are not permitted to redistribute this template ZIP file on any template download website. If you need the latest HTML templates, you may visit <a href="https://www.toocss.com/" target="_blank">Too CSS</a> website that features a great collection of templates in different categories.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-content">
                        <h5><i class="fa fa-map-marker"></i> Visit Us</h5>
                        <span>5 College St NW, <br>Norcross, GA 30071<br>United States</span>
                        <div class="text-button"><a href="show-events-details.html">Need Directions? <i class="fa fa-arrow-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- *** Map ***-->
    <div class="map-image">
        <img src="../assets/images/map-image.jpg" alt="Maps of 3 Venues">
    </div>


    <!-- ***Tickets ***-->
    <div class="venue-tickets">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Tickets</h2>
                    </div>
                </div>
                <?php $counter= 0 ;foreach($tab as $Event ){
                if($counter < 3){
                ?>
                <div class="col-lg-4">
                    <div class="venue-item">
                        <div class="thumb">
                            <img src="../assets/images/venue-0<?php echo $counter + 1 ;?>.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <div class="left-content">
                                <div class="main-white-button">
                                    <a href="ticket-details.php?Matricule=<?php echo $Event["Mat_Event"];?>">Purchase Tickets</a>
                                </div>
                            </div>
                            <div class="right-content">
                                <h4><?php echo $Event["Nom_Event"];?></h4>
                                <p><?php echo $Event["About_Event"];?></p>
                                <ul>
                                    <li><i class="fa fa-sitemap"></i><?php echo ($Event["NBTKT_Event"] + 25);?> </li>
                                    <li><i class="fa fa-user"></i><?php echo $Event["NBTKT_Event"];?></li>
                                </ul>
                                <div class="price">
                                    <span>1 ticket<br>from <em>$<?php echo $Event["Price_Event"];?></em></span>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            <?php $counter++ ;  
                } else{break;} }?>
            </div>
        </div>
    </div>

    <!-- *** Coming Events ***-->
    <div class="coming-events">
        <div class="left-button">
            <div class="main-white-button">
                <a href="shows-events.php">Discover More</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php $counter= 0 ;foreach($tab1 as $Event ){
                if($counter < 3){
                ?>
                <div class="col-lg-4">
                    <div class="event-item">
                        <div class="thumb">
                            <a href="event-details.html"><img src="../assets/images/event-0<?php echo $counter + 1 ;?>.jpg" || alt=""></a>
                        </div>
                        <div class="down-content">
                            <a href="event-details.html"><h4><?php echo $Event["Nom_Event"];?></h4></a>
                            <ul>
                                <li><i class="fa fa-clock-o"></i><?php echo getDayName($Event["Date_Event"]);?> to <?php echo getDayName($Event["DateF_Event"]);?>: 8:00-20:00</li>
                                <li><i class="fa fa-map-marker"></i><?php echo $Event["Adresse_Event"];?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php $counter++ ;  
                } else{break;} }?>
            </div>
        </div>
    </div>

    <!-- *** Footer *** -->
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

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script> 
    <script src="../assets/js/mixitup.js"></script> 
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    
    <!-- Global Init -->

    <script src="../assets/js/custom.js"></script>

  </body>
</html>