<?php

include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit(); // Ensure to stop script execution after redirection
}

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
    exit(); // Ensure to stop script execution after redirection
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion - FAQs Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>
        <link rel="stylesheet" href="css/sty.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    <body>





    <?php
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){
   try {
      $pdo = new PDO("mysql:host=localhost;dbname=evenements", 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $update_name = $_POST['update_name'];
      $update_email = $_POST['update_email'];

      $updateStmt = $pdo->prepare("UPDATE `user_form` SET name = :name, email = :email WHERE id = :user_id");
      $updateStmt->bindParam(':name', $update_name, PDO::PARAM_STR);
      $updateStmt->bindParam(':email', $update_email, PDO::PARAM_STR);
      $updateStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $updateStmt->execute();

      $old_pass = $_POST['old_pass'];
      $update_pass = md5($_POST['update_pass']);
      $new_pass = md5($_POST['new_pass']);
      $confirm_pass = md5($_POST['confirm_pass']);

      if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
         if($update_pass != $old_pass){
            //$message[] = 'old password not matched!';
         }elseif($new_pass != $confirm_pass){
            //$message[] = 'confirm password not matched!';
         }else{
            $updatePassStmt = $pdo->prepare("UPDATE `user_form` SET password = :password WHERE id = :user_id");
            $updatePassStmt->bindParam(':password', $confirm_pass, PDO::PARAM_STR);
            $updatePassStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $updatePassStmt->execute();
            //$message[] = 'password updated successfully!';
         }
      }

      $update_image = $_FILES['update_image']['name'];
      $update_image_size = $_FILES['update_image']['size'];
      $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
      $update_image_folder = 'uploaded_img/' . $update_image;

      if(!empty($update_image)){
         if($update_image_size > 2000000){
            $message[] = 'image is too large';
         }else{
            $image_update_query = $pdo->prepare("UPDATE `user_form` SET image = :image WHERE id = :user_id");
            $image_update_query->bindParam(':image', $update_image, PDO::PARAM_STR);
            $image_update_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $image_update_query->execute();

            if ($image_update_query) {
               move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            //$message[] = 'image updated successfully!';
         }
      }
   } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
   } finally {
      $pdo = null;
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/sty.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      try {
        $pdo = new PDO("mysql:host=localhost;dbname=evenements", 'root', '');
         $selectStmt = $pdo->prepare("SELECT * FROM user_form WHERE id = :user_id");
         $selectStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
         $selectStmt->execute();
         $fetch = $selectStmt->fetch(PDO::FETCH_ASSOC);

         if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png" width="50%" height="50%">';
         } else {
            echo '<img src="uploaded_img/' . $fetch['image'] . '" width="50%" height="50%">';
         }

         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
      } catch (PDOException $e) {
         echo "Error: " . $e->getMessage();
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');




.form-container form p a{
   color:var(--red);
}

.form-container form p a:hover{
   text-decoration: underline;
}



.container .profile{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 4000px;
   border-radius: 3px;
}

.container .profile img{
   height: 150px;
   width: 150px;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}

.container .profile h3{
   margin:5px 0;
   font-size: 20px;
   color:var(--black);
}

.container .profile p{
   margin-top: 20px;
   color:var(--black);
   font-size: 20px;
}

.container .profile p a{
   color:var(--red);
}

.container .profile p a:hover{
   text-decoration: underline;
}

.update-profile{
   min-height: 100vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.update-profile form{
   padding:20px;
   background-color: #D3D3D3;
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 700px;
   text-align: center;
   border-radius: 40px;
}

.update-profile form img{
   height: 200px;
   width: 200p;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}

.update-profile form .flex{
   display: flex;
   justify-content: space-between;
   margin-bottom: 20px;
   gap:15px;
}

.update-profile form .flex .inputBox{
   width: 49%;
}

.update-profile form .flex .inputBox span{
   text-align: left;
   display: block;
   margin-top: 15px;
   font-size: 17px;
   color:var(--black);
}

.update-profile form .flex .inputBox .box{
   width: 100%;
   border-radius: 5px;
   background-color: var(--light-bg);
   padding:12px 14px;
   font-size: 17px;
   color:var(--black);
   margin-top: 10px;
}

@media (max-width:650px){
   .update-profile form .flex{
      flex-wrap: wrap;
      gap:0;
   }
   .update-profile form .flex .inputBox{
      width: 100%;
   }

   .box {
      margin-bottom: 10px;
    }
  
    .error {
      color: red;
    }
    .errorText {
      color: red;
    }
}

</style>
<main>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="index.html">
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
                        <a class="nav-link" href="myindex.php">Events</a>
                    </li>
                </ul>

                <div class="d-none d-lg-block">
                    <a href="login.php" class="bi-person custom-icon me-3"></a>

                    <a href="product-detail.html" class="bi-bag custom-icon"></a>
                </div>
            </div>
        </div>
    </nav>

    

    <section class="faq section-padding">
        
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











