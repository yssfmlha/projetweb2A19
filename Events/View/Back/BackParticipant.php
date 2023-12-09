<?php
include '../../Controller/ParticipantC.php' ;
function formatDateTime($dateTimeString) {
    $dateTime = new DateTime($dateTimeString);
    return $dateTime->format('M d, Y H:i:s');
}
$c = new ParticipantC () ;
$tab = $c->listParticipants();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inned</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@1,300&display=swap" rel="stylesheet">
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-gU9p0o8i40mE6tGzil5Z7uF7tVXtK1egylkU4QcU+8M=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- My Js -->
    <script src="Event.js"></script>
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
                <a href="BackParticipant.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Aymen Ben Mejed</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="BackEvent.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Evenements</a>
                    <a href="BackParticipant.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Participation</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
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
                                        <h6 class="fw-normal mb-0">Aziz send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Aziz send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Aziz send you a message</h6>
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
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Aymen Ben Mejed</span>
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
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Nos Evenements Enregistres</h6>
                        <a href="">Show All</a>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form class="d-none d-md-flex ms-4" action="ChercherParticipant.php" method="POST" onsubmit="handleFormSubmit();">
                            <div class="search-wrapper">
                                <button type="button" onclick="toggleSearchType()" id="toggleButton" class="btn btn-primary" style="position: absolute; left: 308; padding: 14px; border: 1px solid #ced4da; border-radius: 10px 0 0 10px ; margin-bottom : 10px; box-shadow: none;">
                                    <i class="bi bi-search" style="line-height: inherit;"></i>
                                </button>
                                <div id="inputWrapper" class="search-select-wrapper" style="display: flex;">
                                    <input class="form-control border-0 flex-grow-1 search-input" type="search" placeholder="Search..." id="Cher_KEY" name="Cher_KEY" style=" margin-bottom : 10px; margin-left: 30px ; box-shadow: none;" >
                                </div>
                                <div id="selectWrapper" class="search-select-wrapper">
                                    <select class="form-select search-select" id="searchColumn" size="1" name="searchColumn" style="width: 114%; border: none; margin-left: 30px ; margin-bottom : 10px; box-shadow: none;" onchange="toggleSearchType(); updateInputType();" onfocus="hideButton(); this.size=2;" onblur="showButton(); this.size=1;" onchange='this.size=1; this.blur();'>
                                        <option value="CIN">CIN</option>
                                        <option value="Mat_Event">Matricule Event</option>
                                        <option value="NBTKT_Part">NB Ticket</option>
                                        <option value="DateA_Part">Date Achat</option>
                                    </select>
                                </div>
                                <h6 id="validationMessage" style="position:absolute; color : red ; font-size: 12px; margin-top: 65px; margin-right : 100px;"></h6>
                                <button type="Submit" class="btn btn-primary" style="display:none;">-></button>
                            </div>
                        </form>
                    </div>
                    <h6 class="mb-0"  id="resultatMessage"></h6>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="myTable">
                        <thead>
                                <tr>
                                    <th onclick="sortTable(0)" class="Clicked" scope="col">CIN<span class="sort-arrow">
                                    <th onclick="sortTable(1)" class="Clicked" scope="col">Matricule Evenement</th>
                                    <th onclick="sortTable(2)" class="Clicked" scope="col">Ticket</th>
                                    <th onclick="sortTable(2)" class="Clicked" scope="col">Date d'Achat</th>
                                    <th class="not_Clicked" scope="col">QR Code</th>
                                    <th class="not_Clicked"><center>Actions</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($tab as $Participant )
                                {?>
                                    <tr>
                                        <td style="color:#009CFF; font-weight: 1000; "><?php echo $Participant["id_Participant"];?></td>
                                        <td ><?php echo $Participant["id_EventPar"];?></td>
                                        <td ><?php echo $Participant["Nbtkt_Participant"];?></td> 
                                        <td ><?php echo formatDateTime($Participant["DateP_Achat"]);?></td> 
                                        <td><center><img src="<?php echo $Participant["QrCode_Participant"];?>" width="80" height="80"></center></td>
                                        <td><center><a class="btn btn-sm btn-primary" href = "DelParticipant.php?Matricule=<?php echo $Participant["id_Participant"];?>">Supprimer</a></center></td>
                                    </tr>
                                <?php
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Ineed</a>, All Right Reserved. 
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
    <script>
    var currentSortColumn = -1;
    var sortOrder = 1;
    function sortTable(columnIndex) 
    {
        var table = document.getElementById("myTable");
        var rows = Array.from(table.tBodies[0].rows);
        if (columnIndex === currentSortColumn) {
            rows.reverse();
            sortOrder = -sortOrder;
        } else {
            sortOrder = 1;
            rows.sort(function(a, b) {
                var x = getCellValue(a, columnIndex);
                var y = getCellValue(b, columnIndex);
                return sortOrder * (x - y);
            });
        }
        while (table.tBodies[0].firstChild) {
            table.tBodies[0].removeChild(table.tBodies[0].firstChild);
        }
        rows.forEach(function(row) {
            table.tBodies[0].appendChild(row);
        });
        updateArrow(columnIndex);
        currentSortColumn = columnIndex;
    }
    function getCellValue(row, columnIndex) {
        var cellValue = row.cells[columnIndex].innerText.trim();
        return parseFloat(cellValue); 
        
    }
    function updateArrow(columnIndex) {
        document.querySelectorAll('th').forEach(function(th) {
            th.classList.remove('arrow-up', 'arrow-down');
        });
        var header = document.querySelectorAll('th')[columnIndex];
        if (sortOrder === 1) {
            header.classList.add('arrow-up');
        } else if(sortOrder === -1){
            header.classList.add('arrow-down');
        }
    }
    </script>
    <style>
    .search-wrapper {
        display: flex;
        align-items: center;
    }

    .search-input-wrapper,
    .search-select-wrapper {
        display: none;
    }

    .search-input,
    .search-select {
        padding: 10px;
        margin-left: 10px;
        margin-right: 10px;
        width: auto;
    }

    .search-validation-message {
        position: absolute;
        color: red;
        font-size: 12px;
        margin-top: 50px;
        margin-right: 50px;
    }
    #toggleButton {
        transition: opacity 0.3s ease-in-out;
    }

    #searchColumn:focus ~ #toggleButton {
        opacity: 0;
    }

    #searchColumn:blur ~ #toggleButton {
        opacity: 1;
    }
    input[type='date'] {
        padding-left : 70px ;
        width: 100%;
        box-sizing: border-box; 
    }

    input[type='search'] {
        width: 100%;
        box-sizing: border-box;
    }
</style>
    <script>
    function toggleSearchType() 
    {
        var inputWrapper = document.getElementById('inputWrapper');
        var selectWrapper = document.getElementById('selectWrapper');
        var toggleButton = document.getElementById('toggleButton');
        if (inputWrapper.style.display === 'none') 
        {
            inputWrapper.style.display = 'flex';
            selectWrapper.style.display = 'none';
            toggleButton.innerHTML = '<i class="bi bi-search" style="line-height: inherit;"></i>';
        } 
        else 
        {
            inputWrapper.style.display = 'none';
            selectWrapper.style.display = 'inline-block';
            toggleButton.innerHTML = '<i class="bi bi-arrow-left-right" style="line-height: inherit; "></i>';
        }
    }
    function hideButton()
    {
        var toggleButton = document.getElementById('toggleButton');
        toggleButton.style.opacity = '0';
    }
    function showButton()
    {
        var toggleButton = document.getElementById('toggleButton');
        toggleButton.style.opacity = '1';
    }

    function handleFormSubmit() 
    {
        var selectedOption = document.getElementById('searchColumn').value;
        if (selectedOption === 'CIN') 
        {
            verifierDecimal('Cher_KEY','validationMessage');
        }
        else if (selectedOption === 'Mat_Event') 
        {
            verifierDecimal('Cher_KEY','validationMessage');
        } 
        else if(selectedOption === 'NBTKT_Part'){
            verifierDecimal("Cher_KEY","validationMessage");
        }
        else{
            validateDate("Cher_KEY","validationMessage");
        }
    }
    function updateInputType() 
    {
        var selectedOption = document.getElementById('searchColumn').value;
        var inputElement = document.getElementById('Cher_KEY');
        if (selectedOption === 'DateA_Part') 
        {
            inputElement.type = 'date';
        } 
        else 
        {
            inputElement.type = 'search';
        }
    }
</script>
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