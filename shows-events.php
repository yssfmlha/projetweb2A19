<?php
include '../Controller/EventC.php' ;
function getFormattedDate($dateString) {
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
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>ArtXibition Template - Shows and Events Page</title>

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

    <div class="tickets-page contented activate" id="content-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Tickets Page</h2>
                    </div>
                </div>
            <?php $i=0 ; foreach($tab as $Event ){ if( $i < 6 ) { ?>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="../assets/images/ticket-0<?php echo $i + 1 ; ?>.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$<?php echo $Event["Price_Event"];?></em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are <?php echo $Event["NBTKT_Event"];?> Tickets Left For This Show</span>
                            <h4><?php echo $Event["Nom_Event"];?></h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> <?php echo getFormattedDate($Event["Date_Event"]);?>-<?php echo getFormattedDate($Event["DateF_Event"]);?></li>
                                <li><i class="fa fa-map-marker"></i><?php echo $Event["Adresse_Event"];?></li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php?Matricule=<?php echo $Event["Mat_Event"];?>">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; } }?>
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li><a href="#" onclick="toggleContent('content-3')">Prev</a></li>
                            <li onclick="toggleContent('content-1')" class="active" ><a href="#">1</a></li>
                            <li onclick="toggleContent('content-2')"><a href="#">2</a></li>
                            <li onclick="toggleContent('content-3')"><a href="#">3</a></li>
                            <li><a href="#" onclick="toggleContent('content-2')">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tickets-page contented" id="content-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Tickets Page</h2>
                    </div>
                </div>
            <?php $i=0 ; $tab = $c->listEvents(); foreach($tab as $Event ){ if( $i < 12 && $i > 5 ) { ?>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="../assets/images/ticket-0<?php echo $i - 5 ; ?>.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$<?php echo $Event["Price_Event"];?></em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are <?php echo $Event["NBTKT_Event"];?> Tickets Left For This Show</span>
                            <h4><?php echo $Event["Nom_Event"];?></h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> <?php echo getFormattedDate($Event["Date_Event"]);?>-<?php echo getFormattedDate($Event["DateF_Event"]);?></li>
                                <li><i class="fa fa-map-marker"></i><?php echo $Event["Adresse_Event"];?></li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php?Matricule=<?php echo $Event["Mat_Event"];?>">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  }$i++; }?>
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li><a href="#" onclick="toggleContent('content-1')">Prev</a></li>
                            <li onclick="toggleContent('content-1')"><a href="#">1</a></li>
                            <li class="active" onclick="toggleContent('content-2')"><a href="#">2</a></li>
                            <li onclick="toggleContent('content-3')"><a href="#">3</a></li>
                            <li><a href="#" onclick="toggleContent('content-3')" >Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tickets-page contented" id="content-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Tickets Page</h2>
                    </div>
                </div>
            <?php $i=0 ; $tab = $c->listEvents(); foreach($tab as $Event ){ if(  $i > 11 && isset($Event) ) { ?>
                <div class="col-lg-4">
                    <div class="ticket-item">
                        <div class="thumb">
                            <img src="../assets/images/ticket-0<?php echo $i - 11 ; ?>.jpg" alt="">
                            <div class="price">
                                <span>1 ticket<br>from <em>$<?php echo $Event["Price_Event"];?></em></span>
                            </div>
                        </div>
                        <div class="down-content">
                            <span>There Are <?php echo $Event["NBTKT_Event"];?> Tickets Left For This Show</span>
                            <h4><?php echo $Event["Nom_Event"];?></h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> <?php echo getFormattedDate($Event["Date_Event"]);?>-<?php echo getFormattedDate($Event["DateF_Event"]);?></li>
                                <li><i class="fa fa-map-marker"></i><?php echo $Event["Adresse_Event"];?></li>
                            </ul>
                            <div class="main-dark-button">
                                <a href="ticket-details.php?Matricule=<?php echo $Event["Mat_Event"];?>">Purchase Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } $i++;}?>
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li><a href="#" onclick="toggleContent('content-2')">Prev</a></li>
                            <li onclick="toggleContent('content-1')"><a href="#">1</a></li>
                            <li onclick="toggleContent('content-2')"><a href="#">2</a></li>
                            <li  class="active"  onclick="toggleContent('content-3')"><a href="#">3</a></li>
                            <li><a href="#" onclick="toggleContent('content-1')" >Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
  let activeIndex = 1 ;
  function updateActiveClass(newIndex,Nbcontent) {
    document.querySelectorAll('#content-' + Nbcontent + ' .pagination li').forEach((li, index) => {
      li.classList.remove('active');
      if (index === newIndex ) {
        li.classList.add('active');
      }
    });
  }
  function nextPage(Nbcontent) {
    if (activeIndex < 3 ) {
      activeIndex++;
      updateActiveClass(activeIndex , Nbcontent );
    }
    else
    {
        activeIndex = 1;
        updateActiveClass(activeIndex , Nbcontent );
    }
  }
  function prevPage(Nbcontent) {
    if (activeIndex > 1 ) {
      activeIndex--;
      updateActiveClass(activeIndex, Nbcontent);
    }
    else
    {
        activeIndex = 3;
        updateActiveClass(activeIndex , Nbcontent);
    }
  }
</script>

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
    <script src="Test.js"></script>
  </body>

</html>