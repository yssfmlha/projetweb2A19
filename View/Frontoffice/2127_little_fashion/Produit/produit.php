<?php
require '../../../../controller/produitC.php';
$c = new produitC();
$tab = $c->listproduit();
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
    .add-to-cart-button {
        background-color: transparent;
        color: #ff8c00; /* Orange color */
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
    }

    .add-to-cart-button:hover {
        color: #ff4500; /* Darker orange on hover */
    }
    .confirm-purchase-button {
        background-color: lightgrey;
        color: #ff8c00; /* Orange color */
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
    }

    .confirm-purchase-button:hover {
        color: #ff4500; /* Darker orange on hover */
    }
</style>

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
                                <a class="nav-link" href="../index.html">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="home.php">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../products.php">Charities</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../Votrestartup.php">Startup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Events/myindex.php">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../forum/index.php">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="position:relative;left:220px;" href="../affichage.php">Your Donations</a>
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
            <?php
$tab = array(
    array(
        'categorie_ref' => 34,
        'id_produit' => 47,
        'nom_produit' => 't-shirt',
        'prix_produit' => 14,
        'image_url' => 'img/sweatshirt.png'
    ),
    array(
        'categorie_ref' => 34,
        'id_produit' => 48,
        'nom_produit' => 'jean',
        'prix_produit' => 56,
        'image_url' => 'img/jean.png'

    ),
    array(
        'categorie_ref' => 34,
        'id_produit' => 49,
        'nom_produit' => 'kabout xD',
        'prix_produit' => 56,
        'image_url' => 'img/kabout.png'

    )
    

    )
    
;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Shopping Cart</title>
    <style>
        /* Add some styles for the cart display */
        #cart {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<section class="products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5">Produits</h2>
            </div>

            <?php foreach ($tab as $produit) { 
                if($produit["categorie_ref"]==$_GET["categorie_ref"]){?>
                <div class="col-lg-4 col-12 mb-3">
                    <div class="product-container">
                        <div class="product-thumb">
                            <a href="javascript:void(0);">
                                <img src="<?php echo $produit['image_url']; ?>" alt="<?php echo $produit['nom_produit']; ?>">
                            </a>
                            <div class="product-info d-flex">
                                <div>
                                    <h5 class="product-title mb-0"><?php echo $produit['nom_produit']; ?></h5>
                                    <p class="product-price"><?php echo $produit['prix_produit']; ?></p>
                                    <!-- Add a button to add the product to the cart -->
                                    <button class="add-to-cart-button" onclick="addToCart(<?php echo $produit['prix_produit']; ?>)">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }} ?>
        </div>
    </div>
</section>
<button class="confirm-purchase-button" onclick="confirmPurchase()">Confirm Purchase</button>
<div id="cart">
    <h4>Shopping Cart</h4>
    <p>Total: $<span id="totalPrice">0.00</span></p>
    
</div>

<!-- Include JavaScript to handle the cart interactions -->
<script>
    // Initialize the total price variable
    var totalPrice = 0;

    // Function to add product to the cart
    function addToCart(productPrice) {
        // Add the product price to the total
        totalPrice += productPrice;

        // Update the total price in the cart display
        document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
    }
    function confirmPurchase() {
        // Redirect to the payment page
        window.location.href = 'payment.php?total=' + totalPrice.toFixed(2);
    }
</script>
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
