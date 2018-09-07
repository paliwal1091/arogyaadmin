<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Arogya</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="index.html">Arogya</a>
                </h1>
                <span>M</span>
            </div>
            <div class="profile-bg"></div>
            
          <?php
          
          if($_SESSION['userbean']['user_role']=='DOCTOR'){
               include_once './_tree_doctor.php';
          }else if($_SESSION['userbean']['user_role']=='ACCOUNTANT'){
               include_once './_tree_accountant.php';
          }else if($_SESSION['userbean']['user_role']=='ADMIN'){
               include_once './_tree_admin.php';
          }else if($_SESSION['userbean']['user_role']=='LAB'){
               include_once './_tree_lab.php';
          }else if($_SESSION['userbean']['user_role']=='OPD'){
               include_once './_tree_opd.php';
          }else if($_SESSION['userbean']['user_role']=='PHARMACIST'){
               include_once './_tree_pharmacist.php';
          }else if($_SESSION['userbean']['user_role']=='TRANSPORT'){
               include_once './_tree_transport.php';
          }else if($_SESSION['userbean']['user_role']=='WARD'){
               include_once './_tree_ward.php';
          }
          
          ?>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
        <nav class="navbar navbar-default mb-xl-5 mb-4">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <ul class="top-icons-agileits-w3layouts float-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <span class="badge">4</span>
                </a>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                       <?php echo $_SESSION['userbean']['user_role']; ?>
                </a>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu drop-3">
                    <div class="profile d-flex mr-o">
                        <div class="profile-l align-self-center">
                            <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                        </div>
                        <div class="profile-r align-self-center">
                            <h3 class="sub-title-w3-agileits"><?php echo $_SESSION['userbean']['first_name']; ?></h3>
                            <a href="<?php echo $_SESSION['userbean']['email']; ?>"><?php echo $_SESSION['userbean']['email']; ?></a>
                        </div>
                    </div>
                    <a href="profile.php" class="dropdown-item mt-3">
                        <h4>
                            <i class="far fa-user mr-3"></i>My Profile</h4>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
            <!--// top-bar -->

            <!-- main-heading -->
            <!--// main-heading -->
            <!-- Page Content -->
            <div class="blank-page-content">
               <?php echo '<tt><pre>' . var_export($_SESSION['userbean'], TRUE) . '</pre></tt>';?>
            </div>

            <!--// Page Content -->

            <!-- Copyright -->
           <?php include './_footer.php';?>
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>