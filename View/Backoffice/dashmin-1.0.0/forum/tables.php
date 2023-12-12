<?php
include "c:/xampp/htdocs/projet_web/Controller/userC.php";
session_start();
$user=$_SESSION["user_id"];
$object=new UserC();
$info=$object->listuser($user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>iNeed</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../user/uploaded_img/<?php echo($info[0]['image']);?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo($info[0]["name"]);?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <a href="../index.php" class="nav-item nav-link"><i class="fa fa-chart-pie me-2"></i>Statistics</a>
                <a href="tables.php" class="nav-item nav-link active"><i class="fa fa-underline me-2"></i>Forum</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Events</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../Events/BackEvent.php" class="dropdown-item">Events</a>
                            <a href="../Events/BackParticipant.php" class="dropdown-item">Participations</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../produit/listproduit.php" class="dropdown-item">Products</a>
                            <a href="../produit/listcategorie.php" class="dropdown-item">Categories</a>
                        </div>
                    </div>
                    <a href="../table.php" class="nav-item nav-link"><i class="fa fa-gift me-2"></i>Donations</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-hand-holding-heart me-2"></i>Charity</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../Charity.php" class="dropdown-item">Charities</a>
                            <a href="../form.php" class="dropdown-item">Add a Charity</a>
                        </div>
                    </div>
                    <a href="../user/table.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Users</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Startup</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="../admin_startup.php" class="dropdown-item">Nos Startups</a>
                            <a href="../adminprojets.php" class="dropdown-item">Projets</a>
                            <a href="../statistiques.php" class="dropdown-item">Statistiques</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../user/uploaded_img/<?php echo($info[0]['image']);?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo($info[0]["name"]);?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
    <!-- Button to Add Post -->
            <?php
            require_once 'config.php';
          
            
            $conn = DatabaseConfig::getConnexion();     
            if (!empty($_GET['search'])) {
                // Retrieve search query
                $searchQuery = $_GET['search'];
            
                // Fetch posts that match the search query in title or author
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
            if(isset($posts)&&!empty($posts)){
                ?>
                <a class="btn" href="add_post.php">Add Post</a>

<form method="GET" action="">
<input type="text" name="search" placeholder="Search by title or author" oninput="censorInput(this)">
<button type="submit">Search</button>
</form>
<form method="GET" action="">
  <label for="sort">Sort By:</label>
   <select name="sort" id="sort">
    <option value="normal">Normal</option>
    <option value="likes">Likes</option>
    <option value="dislikes">Dislikes</option>
 </select>
 <button type="submit">Sort</button>
</form>
<script src="script.js"></script>
<!-- Table for Posts -->
<h2>All Posts AND COMMENTS</h2>
<table class="post-table">
    <thead>
        <tr>
            <th>Type</th>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Created At</th>
            <th>Likes</th>
            <th>Dislikes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
            <?php
            foreach ($posts as $post) {
                echo "<tr>";
                echo "<td>post</td>";
                echo "<td>" . ($post['title'] ?? 'Title not available') . "</td>";
                echo "<td>" . ($post['content'] ?? 'Content not available') . "</td>";
                echo "<td>" . ($post['author'] ?? 'Author not available') . "</td>";
                echo "<td>" . ($post['created_at'] ?? 'Date not available') . "</td>";
                echo "<td> " . ($post['likes']?? 'Likes not available') . "</td>";
                echo "<td> " . ($post['dislikes']?? 'Dislikes not available') . "</td>";
                echo "<td>";
                echo "<div style='display: flex; gap: 10px;'>";
                echo "<form action='edit.php' method='GET'>";
                echo "<input type='hidden' name='id' value='{$post['id']}'>";
                echo "<button type='submit'>Edit</button>";
                echo "</form>";
                
                echo "<form action='delete_post.php' method='GET'>";
                echo "<input type='hidden' name='delete_id' value='{$post['id']}'>";
                echo "<button type='submit'>Delete</button>";
                echo "</form>";
                echo "<form method='POST' action='like_post.php'>";
               echo "<input type='hidden' name='post_id' value='{$post['id']}'>";
               echo "<button type='submit' name='like'>Like</button>";
               echo "</form>";
               echo "<form method='POST' action='dislike_post.php'>";
               echo "<input type='hidden' name='post_id' value='{$post['id']}'>";
               echo "<button type='submit' name='dislike'>Dislike</button>";
                echo "</form>";

                echo "<a href='add_comment.php?post_id={$post['id']}'>Add Comment</a>"; // Link to add comment page for this post
                echo "</td>";
                echo "</tr>";
                
                // Fetch comments for the current post
                $stmt_comments = $conn->prepare("SELECT * FROM comments WHERE post_id = :post_id");
                $stmt_comments->bindParam(':post_id', $post['id']);
                $stmt_comments->execute();
                $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($comments as $comment) {
                    echo "<tr>";
                    echo "<td>comment</td>";
                    echo "<td>" . $comment['post_id'] . "</td>"; // Display the associated post ID
                    echo "<td>" . ($comment['comment_text'] ?? 'No comment') . "</td>";
                    echo "<td>" . ($comment['author'] ?? 'Unknown') . "</td>";
                    echo "<td>" . ($comment['created_at'] ?? 'Date not available') . "</td>";
                    
                    echo "<td>vide</td>";
                    echo "<td>vide</td>";
                    echo "<td>";
                     echo "<form action='edit_comment.php' method='GET'>";
                echo "<input type='hidden' name='comment_id' value='{$comment['id']}'>";
                echo "<button type='submit'>Edit Comment</button>";
                echo "</form>";
                
                echo "<form action='delete_comment.php' method='GET'>";
                echo "<input type='hidden' name='comment_id' value='{$comment['id']}'>";
                echo "<button type='submit'>Delete Comment</button>";
                echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <!-- Most Liked Posts Table -->
<h2>Most Liked Posts</h2>
<table class="post-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Likes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch most liked posts
        $stmt_likes = $conn->prepare("SELECT * FROM posts ORDER BY likes DESC LIMIT 3");
        $stmt_likes->execute();
        $liked_posts = $stmt_likes->fetchAll(PDO::FETCH_ASSOC);

        foreach ($liked_posts as $liked_post) {
            echo "<tr>";
            echo "<td>" . ($liked_post['title'] ?? 'Title not available') . "</td>";
            echo "<td>" . ($liked_post['content'] ?? 'Content not available') . "</td>";
            echo "<td>" . ($liked_post['likes'] ?? 'Likes not available') . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- Most Disliked Posts Table -->
<h2>Most Disliked Posts</h2>
 <table class="post-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Dislikes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch most disliked posts
        $stmt_dislikes = $conn->prepare("SELECT * FROM posts ORDER BY dislikes DESC LIMIT 3");
        $stmt_dislikes->execute();
        $disliked_posts = $stmt_dislikes->fetchAll(PDO::FETCH_ASSOC);

        foreach ($disliked_posts as $disliked_post) {
            echo "<tr>";
            echo "<td>" . ($disliked_post['title'] ?? 'Title not available') . "</td>";
            echo "<td>" . ($disliked_post['content'] ?? 'Content not available') . "</td>";
            echo "<td>" . ($disliked_post['dislikes'] ?? 'Dislikes not available') . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
 </table>
 <?php
// Count all posts
$stmt_count = $conn->prepare("SELECT COUNT(*) AS total_posts FROM posts");
$stmt_count->execute();
$total_posts = $stmt_count->fetch(PDO::FETCH_ASSOC)['total_posts'];

// Count liked posts
$stmt_liked_count = $conn->prepare("SELECT COUNT(*) AS liked_posts FROM posts WHERE likes > 0");
$stmt_liked_count->execute();
$liked_posts_count = $stmt_liked_count->fetch(PDO::FETCH_ASSOC)['liked_posts'];

// Count disliked posts
$stmt_disliked_count = $conn->prepare("SELECT COUNT(*) AS disliked_posts FROM posts WHERE dislikes > 0");
$stmt_disliked_count->execute();
$disliked_posts_count = $stmt_disliked_count->fetch(PDO::FETCH_ASSOC)['disliked_posts'];

// Calculate percentages
$liked_percentage = ($liked_posts_count / $total_posts) * 100;
$disliked_percentage = ($disliked_posts_count / $total_posts) * 100;
 ?>
 <!-- Liked Posts Pie Chart -->
<h2>Liked Posts Percentage</h2>
<canvas id="likedChart" width="400" height="300"></canvas>

<!-- Disliked Posts Pie Chart -->
<h2>Disliked Posts Percentage</h2>
<canvas id="dislikedChart" width="400" height="300"></canvas>
<!-- Total Posts Pie Chart -->
<h2>Liked Disliked And No Reaction Percentage</h2>
<canvas id="totalChart" width="400" height="300"></canvas>
<?php
    }
    else{
        echo("<h3>There are no posts</h3>");
    }
?>


<canvas id="totalChart"></canvas>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
    // Get the percentage values
    var likedPercentage = <?php echo $liked_percentage; ?>;
    var dislikedPercentage = <?php echo $disliked_percentage; ?>;
    var othersPercentage = 100 - likedPercentage - dislikedPercentage;
    var othersPercentage1 = 100 - likedPercentage ;
    var othersPercentage2 = 100 - dislikedPercentage;

    var likedData = {
        labels: ["Liked", "Not Liked", ],
        datasets: [{
            data: [likedPercentage, othersPercentage1],
            backgroundColor: ["#007bff", "#f2f2f2"]
        }]
    };

  
    var dislikedData = {
        labels: ["Disliked", "Not Disliked", ],
        datasets: [{
            data: [dislikedPercentage, othersPercentage2],
            backgroundColor: ["#dc3545", "#f2f2f2"]
        }]
    };
    var totaldata = {
        labels: ["Liked","Disliked", "NO Reaction", ],
        datasets: [{
            data: [likedPercentage,dislikedPercentage, othersPercentage],
            backgroundColor: ["#007bff","#dc3545", "#f2f2f2"]
        }]
    };

    var likedChartCtx = document.getElementById('likedChart').getContext('2d');
var likedChart = new Chart(likedChartCtx, {
    type: 'pie',
    data: likedData,
    options: {
        responsive: false, // Disable responsiveness
        maintainAspectRatio: false, // Disable aspect ratio
        width: 400, // Set width here
        height: 300 // Set height here
    }
});

var dislikedChartCtx = document.getElementById('dislikedChart').getContext('2d');
var dislikedChart = new Chart(dislikedChartCtx, {
    type: 'pie',
    data: dislikedData,
    options: {
        responsive: false, // Disable responsiveness
        maintainAspectRatio: false, // Disable aspect ratio
        width: 400, // Set width here
        height: 300 // Set height here
    }
});

var totalChartCtx = document.getElementById('totalChart').getContext('2d');
var totalChart = new Chart(totalChartCtx, {
    type: 'pie',
    data: totaldata,
    options: {
        responsive: false, // Disable responsiveness
        maintainAspectRatio: false, // Disable aspect ratio
        width: 400, // Set width here
        height: 300 // Set height here
    }
});

</script>



     <!-- Footer Start -->
     <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<style>
      
    /* Search Bar */
    input[type="text"] {
        width: 300px;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    button[type="submit"] {
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Table */
    .post-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .post-table th,
    .post-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .post-table th {
        background-color: #f2f2f2;
    }

    /* Buttons */
    .btn {
        display: inline-block;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        background-color: #007bff; /* Changed to blue */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0056b3; /* Darker shade of blue on hover */
    }
</style>
