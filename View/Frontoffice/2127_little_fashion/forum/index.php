<?php
require_once 'config.php';
require_once 'add_post.php';
require_once 'delete_post.php';
require_once 'comment.php';
require_once 'add_comment.php';
require "c:/xampp/htdocs/projet_web/Controller/userC.php";
session_start();
echo($_SESSION["user_id"]);
$userc=new UserC();
$user=$userc->listuser($_SESSION["user_id"]);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion - About Page</title>

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
                                <a class="nav-link" href="../Events/myindex.php">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="position:relative;left:200px;" href="../affichage.php">Your Donations</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="../2127_little_fashion/login.php" class="bi-person custom-icon me-3"></a>

                            <a href="../Produit/home.php" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Chat with</span>
                                <span class="d-block text-dark">Other people</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <img src="images/header/businesspeople-meeting-office-working.jpg" class="header-image img-fluid" alt="">
            </header>
            <div class="form-container" style="background-color: #f0f0f0; padding: 20px;">
            <?php
$conn = DatabaseConfig::getConnexion(); // Assuming this gets the PDO connection

// Query to select a random username and id from the Users table
$sql = "SELECT id, name FROM user_form ORDER BY RAND() LIMIT 1";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Execute the query
$stmt->execute();

// Fetch the result (random username and id)
$randomUser = $stmt->fetch(PDO::FETCH_ASSOC);

// Access the random username and id


// Now $randomName contains the randomly selected username and $randomId contains the user's ID from the Users table
?>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by title or author" oninput="censorInput(this)">
        <button type="submit" style="background-color:#F36A16;">Search</button>
    </form>
    <form method="GET" action="">
      <label for="sort">Sort By:</label>
       <select name="sort" id="sort">
        <option value="normal">Normal</option>
        <option value="likes">Likes</option>
        <option value="dislikes">Dislikes</option>
     </select>
     <button type="submit" style="background-color:#F36A16;">Sort</button>
    </form>
    <form id="postForm" method="POST" action="add_post.php">
   <?php echo "<input type='hidden' name='author'  value=' " . $user[0]["name"] . "' oninput='censorInput(this)'><br>" ?>
   <?php echo "<input type='hidden' name='author_id' value='" . $_SESSION["user_id"] . "'>" ?>
        <input type="text" name="title" placeholder="Title" oninput="censorInput(this)" required><br>
        <textarea name="content" placeholder="Content" oninput="censorInput(this)" required></textarea><br>
        <button type="submit" style="background-color:#F36A16;">Add Post</button>
    </form>

    <div class="container">
        <script src="script.js"></script>
        <?php
        // The rest of your PHP code for fetching posts and comments goes here
        try {
            $conn = DatabaseConfig::getConnexion();
            if (!empty($_GET['search'])) {
            
                $searchQuery = $_GET['search'];
            
              
                $stmt = $conn->prepare("SELECT * FROM posts WHERE title LIKE :query OR author LIKE :query");
                $searchParam = "%{$searchQuery}%";
                $stmt->bindParam(':query', $searchParam);
                $stmt->execute();
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                
                $sort = isset($_GET['sort']) ? $_GET['sort'] : 'normal';

                // Adjust the SQL query based on the sort criteria
                switch ($sort) {
                    case 'likes':
                        $stmt = $conn->prepare("SELECT * FROM posts ORDER BY likes DESC");
                        break;
                    case 'dislikes':
                        $stmt = $conn->prepare("SELECT * FROM posts ORDER BY dislikes DESC");
                        break;
                    default:
                        $stmt = $conn->prepare("SELECT * FROM posts");
                        break;
                }
                $stmt->execute();
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            }
        
          
            foreach ($posts as $post) {
                echo "<div class='post'>";
                echo "<h3>" . ($post['title'] ?? 'Title not available') . "</h3>";
                echo "<p>" . ($post['content'] ?? 'Content not available') . "</p>";
                echo "<p>Author: " . ($post['author'] ?? 'Author not available') . "</p>";
                echo "<p>Created At: " . ($post['created_at'] ?? 'Date not available') . "</p>";
                echo "<form method='POST' action='like_post.php'>";
                echo "<input type='hidden' name='post_id' value='{$post['id']}'>";
                echo "<input type='hidden' name='user_id' value='" . $_SESSION["user_id"] . "'>";
                echo "<button type='submit' name='like' style='background-color:#F36A16;'>Like</button>";
                echo "</form>";
                echo "<form method='POST' action='dislike_post.php'>";
                echo "<input type='hidden' name='post_id' value='{$post['id']}'>";
                echo "<input type='hidden' name='author_id' value='" . $_SESSION["user_id"] . "'>"; 
                echo "<button type='submit' name='dislike' style='background-color:#F36A16;'>Dislike</button>";
                 echo "</form>";
                echo "Likes: " . $post['likes']; 
                echo "    Dislikes: " . $post['dislikes']; 
                
                
                // Edit and Delete buttons
                echo "<div style='display: flex; gap: 10px;'>";

                // Check if the current user is the author of the post
                if ($_SESSION["user_id"] == $post['author_id']) {
                    echo "<form action='edit.php' method='GET'>";
                    echo "<input type='hidden' name='id' value='{$post['id']}'>";
                    echo "<button type='submit' style='background-color:#F36A16;'>Edit</button>";
                    echo "</form>";
            
                    echo "<form action='delete_post.php' method='GET'>";
                    echo "<input type='hidden' name='delete_id' value='{$post['id']}'>";
                    echo "<button type='submit' style='background-color:#F36A16;'>Delete</button>";
                    echo "</form>";
                }
                echo "</div>";
                  // Comment form
                  echo "<div class='comment-form'>";
                  echo "<form method='POST' action='add_comment.php'>";
                  echo "<input type='hidden' name='author_id' value='" . $_SESSION["user_id"] . "'>";
                  echo "<input type='hidden' name='post_id' value='{$post['id']}'>";
                  echo "<input type='hidden' name='author' value='" . $user[0]["name"] . "' oninput='censorInput(this)'><br>";
                  echo "<textarea name='comment_text' placeholder='Your comment' oninput='censorInput(this)' required></textarea><br>";
                  echo "<button type='submit' style='background-color:#F36A16;'>Add Comment</button>";
                  echo "</form>";
                  echo "</div>";
        
               
                $stmt_comments = $conn->prepare("SELECT * FROM comments WHERE post_id = :post_id");
                $stmt_comments->bindParam(':post_id', $post['id']);
                $stmt_comments->execute();
                $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
                echo "</div>"; 
                // Display comments for the current post
                if (!empty($comments)) {
                    echo "<h4>Comments:</h4>";
                    foreach ($comments as $comment) {
                        echo "<div>";
                        echo "<p>Author: " . ($comment['author'] ?? 'Unknown') . "</p>";
                        echo "<p>Comment: " . ($comment['comment_text'] ?? 'No comment') . "</p>";
                        echo "<p>Posted At: " . ($comment['created_at'] ?? 'Date not available') . "</p>";
                        echo "</div>";
                        if ($_SESSION["user_id"] == $comment['author_id']) {
                            echo "<form action='edit_comment.php' method='GET'>";
                            echo "<input type='hidden' name='comment_id' value='{$comment['id']}'>";
                            echo "<button type='submit' style='background-color:#F36A16;'>Edit Comment</button>";
                            echo "</form>";
                
                            echo "<form action='delete_comment.php' method='GET'>";
                            echo "<input type='hidden' name='comment_id' value='{$comment['id']}'>";
                            echo "<button type='submit' style='background-color:#F36A16;'>Delete Comment</button>";
                            echo "</form>";
                        }
                        echo "</div>";
                
                    }
                } else {
                    echo "<p>No comments yet.</p>";
                }
                
                echo "</div>"; // End post div
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
    </div>

<footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">I</a>Need</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">About</a></li>

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
<style>
    /* Input fields */
input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

/* Button style */
button[type="submit"] {
    padding: 10px 20px;
    background-color: #337ab7;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Hover effect on button */
button[type="submit"]:hover {
    background-color: #286090;
}
.form-container {
            margin-top: 20px;
        }
</style>