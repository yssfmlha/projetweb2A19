 <?php
 include "c:/xampp/htdocs/projet_web/Controller/userC.php";
 session_start();
 $user=$_SESSION["user_id"];
 $object=new UserC();
 $info=$object->listuser($user);
 echo($user);
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    

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
                <a href="../forum/tables.php" class="nav-item nav-link"><i class="fa fa-underline me-2"></i>Forum</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Events</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../Events/BackEvent.php" class="dropdown-item ">Events</a>
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
                    <a href="../user/table.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Users</a>
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
                            <img class="rounded-circle me-lg-2" src="uploaded_img/<?php echo($info[0]['image']);?>" alt="" style="width: 40px; height: 40px;">
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


            <!-- Table Start -->
            <!DOCTYPE html>


    <title>User Form Backoffice</title>
    <style>
        /* Add your CSS styles here */
        body {
            transition: background-color 0.5s ease;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: rgb(22, 177, 255);
            color: white;
        }

        .delete-btn {
            cursor: pointer;
            padding: 8px;
            margin-right: 5px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .delete-btn:hover {
            background-color: #005b80;
        }

        /* Styles pour les couleurs des lignes */
        tr:nth-child(odd) {
            background-color: #E6F7FF;
            /* Bleu ciel */
        }

        tr:nth-child(even) {
            background-color: #B3E0FF;
            /* Autre teinte de bleu ciel */
        }

        /* Styles pour le champ de recherche */
        #searchInput {
            padding: 8px;
            margin-bottom: 10px;
        }

        /* Night mode styles */
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }
    </style>


    <!-- Night mode toggle button -->
    <button onclick="toggleNightMode()">Toggle Night Mode</button>

    <button onclick="downloadFullScreen()">Download Full Screen</button>

    <!-- Security Modal -->
    <div id="securityModal" style="display: block; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px;">
            <label for="securityCodeInput">Enter Security Code:</label>
            <input type="text" id="securityCodeInput">
            <button onclick="loadData()">Submit</button>
        </div>
    </div>

    <h2 style="text-align: center;">  User Form Backoffice</h2>

    <input type="text" id="searchInput" oninput="filterTable()" placeholder="Search by Name">

    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name <span onclick="sortTable(1)">▲</span></th>
                <th>Email</th>
                <th>Password</th>
                <th>Image</th>
                <th>Last Opened <span onclick="sortTable(5)">▲</span></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table rows will be dynamically added here using JavaScript -->
        </tbody>
    </table>

    <script>
        // Function to check security code
        function checkSecurityCode() {
            const securityCodeInput = document.getElementById('securityCodeInput');
            const enteredCode = securityCodeInput.value;

            if (enteredCode === 'bouhmid') {
                // If the code is correct, close the modal
                closeSecurityModal();
                return true;
            } else {
                // If the code is incorrect, show an alert and return false
                alert('Incorrect security code. Page will not be loaded.');
                return false;
            }
        }

        // Function to open the security modal
        function openSecurityModal() {
            const modal = document.getElementById('securityModal');
            modal.style.display = 'block';
        }

        // Function to close the security modal
        function closeSecurityModal() {
            const modal = document.getElementById('securityModal');
            modal.style.display = 'none';
        }

        // Open the security modal when the page loads
        window.onload = openSecurityModal;

        // Function to load data after security check
        function loadData() {
            if (checkSecurityCode()) {
                // Load data only after the security code is checked and resolved
                populateTable();
            }
        }

        // Function to populate the table with data
        function populateTable() {
            const tableBody = document.querySelector('#userTable tbody');
            tableBody.innerHTML = '';

            // AJAX request to fetch user data from the server
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const usersData = JSON.parse(xhr.responseText);
                        usersData.forEach((user, index) => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${user.id}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>${user.password}</td>
                                <td>${user.image}</td>
                                <td>${user.last_opened}</td>
                                <td>
                                    <button class="delete-btn" onclick="deleteUser(${user.id})">Delete</button>
                                </td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        console.error('Failed to fetch user data');
                    }
                }
            };
            xhr.open('GET', 'get_users.php'); // Assuming you have a PHP file to handle fetching users
            xhr.send();
        }

        // Function to filter table by name
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('#userTable tbody tr');

            rows.forEach(row => {
                const nameColumn = row.children[1];
                const name = nameColumn.textContent.toLowerCase();

                if (name.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Function to delete user
        function deleteUser(userId) {
            const confirmDelete = confirm('Are you sure you want to delete this user?');
            if (confirmDelete) {
                // AJAX request to delete user from the server
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // After successful deletion, refresh the table
                            populateTable();
                        } else {
                            console.error('Failed to delete user');
                        }
                    }
                };

                // Replace 'delete_user.php' with the actual endpoint to handle user deletion on your server
                xhr.open('GET', `delete_user.php?id=${userId}`);
                xhr.send();
            }
        }

        // Function to sort table by column
        function sortTable(column) {
            const table = document.getElementById('userTable');
            const tbody = table.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                const textA = a.children[column].textContent;
                const textB = b.children[column].textContent;

                if (column === 1 || column === 5) {
                    // For text and date columns, use localeCompare for accurate sorting
                    return textA.localeCompare(textB);
                } else {
                    // For other columns, use simple string comparison
                    return textA > textB ? 1 : -1;
                }
            });

            // Empty the tbody and append sorted rows
            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));
        }

        // Initial population of the table
        // populateTable(); // Commented out to prevent automatic population on page load

        // Function to toggle night mode
        function toggleNightMode() {
            document.body.classList.toggle('dark-mode');
        }

        // Function to download full screen
        function downloadFullScreen() {
            const body = document.body;
            html2pdf(body);
            
        }
    </script>

    <!-- Include the html2pdf library -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>



            






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