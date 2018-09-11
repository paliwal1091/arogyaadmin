
<?php session_start();
include './DB.php';?>
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
                if ($_SESSION['userbean']['user_role'] == 'DOCTOR') {
                    include_once './_tree_doctor.php';
                } else if ($_SESSION['userbean']['user_role'] == 'ACCOUNTANT') {
//                    include_once './_tree_accountant.php';
                } else if ($_SESSION['userbean']['user_role'] == 'ADMIN') {
                    include_once './_tree_admin.php';
                } else if ($_SESSION['userbean']['user_role'] == 'LAB') {
//                    include_once './_tree_lab.php';
                } else if ($_SESSION['userbean']['user_role'] == 'OPD') {
//                    include_once './_tree_opd.php';
                } else if ($_SESSION['userbean']['user_role'] == 'PHARMACIST') {
                    include_once './_tree_pharmacist.php';
                } else if ($_SESSION['userbean']['user_role'] == 'TRANSPORT') {
//                    include_once './_tree_transport.php';
                } else if ($_SESSION['userbean']['user_role'] == 'WARD') {
//                    include_once './_tree_ward.php';
                }
                ?>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <!-- top-bar -->
              <?php     include_once './_top_bar.php'; ?>
                <!--// top-bar -->
                <!-- main-heading -->
                <!--// main-heading -->
                <!-- Page Content -->
                <div class="blank-page-content">

<?php
if ($_SESSION['userbean']['user_role'] == 'DOCTOR') {
    include_once './doctor/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'ACCOUNTANT') {
    include_once './_tree_accountant.php';
} else if ($_SESSION['userbean']['user_role'] == 'ADMIN') {
    include_once './admin/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'LAB') {
    include_once './_tree_lab.php';
} else if ($_SESSION['userbean']['user_role'] == 'OPD') {
    include_once './_tree_opd.php';
} else if ($_SESSION['userbean']['user_role'] == 'PHARMACIST') {
    include_once './_tree_pharmacist.php';
} else if ($_SESSION['userbean']['user_role'] == 'TRANSPORT') {
    include_once './_tree_transport.php';
} else if ($_SESSION['userbean']['user_role'] == 'WARD') {
    include_once './_tree_ward.php';
}
?>

                    <?php echo '<tt><pre>' . var_export($_SESSION['userbean'], TRUE) . '</pre></tt>'; ?>
                </div>

                <!--// Page Content -->

                <!-- Copyright -->
<?php include './_footer.php'; ?>
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