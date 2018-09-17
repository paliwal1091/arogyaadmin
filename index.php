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
        <!-- Fontawesome Css -->
        <link href="css/fontawesome-all.css" rel="stylesheet">
        <!--// Fontawesome Css -->
        <!--// Style-sheets -->
        <!--web-fonts-->
        <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!--//web-fonts-->

    </head>

    <body>
        <div class="bg-page py-5">
            <div class="container">
                <!-- main-heading -->
                <h2 class="main-title-w3layouts mb-2 text-center text-white">Login</h2>
                <!--// main-heading -->
                <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                    <form action="#" method="post">
                        <div class="form-group">

                            <?php
                            include './DB.php';
                            if (isset($_POST['btnLogin'])) {

                                date_default_timezone_set('Asia/Colombo');
                                $today = date("Y-m-d", time());

                                if ($_POST['user_role'] == 'DOCTOR') {
                                    $sql = "SELECT * FROM hms_doctor WHERE nic = '" . $_POST['nic'] . "' AND pword = PASSWORD('" . $_POST['pword'] . "') AND status_code = 'ACTIVE'";

                                    $result = getData($sql);
                                    if ($result) {
                                        foreach ($result as $value) {
                                            $_SESSION['userbean'] = $value;
                                            $_SESSION['sitename'] = 'arogyaadmin';
                                            $_SESSION['today'] = $today;
                                        }
                                        header("Location:home.php");
                                    } else {
                                        echo '<p class="text-danger">Invlaid username or password</p>';
                                    }
                                } else {
                                    $sql = "SELECT * FROM hms_user WHERE nic = '" . $_POST['nic'] . "' AND pword = PASSWORD('" . $_POST['pword'] . "') AND status_code = 'ACTIVE' ";

                                    $result = getData($sql);
                                    $base_url = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/';
                                    if ($result) {
                                        foreach ($result as $value) {
                                            $_SESSION['userbean'] = $value;
                                            $_SESSION['sitename'] = 'arogyaadmin';
                                            $_SESSION['today'] = $today;
                                        }
                                        header("Location:home.php");
                                    } else {
                                        echo '<p class="text-danger">Invlaid username or password</p>';
                                    }
                                }
                            }
                            ?>
                            <label>Login As</label>
                            <select name="user_role" class="form-control" required="">
                                <option value="">--select user role--</option>
                                <option value="DOCTOR">Doctor</option>
                                <option value="ACCOUNTANT">Accountant</option>
                                <option value="PHARMACIST">Pharmacist</option>
                                <option value="TRANSPORT">Transport Manager</option>
                                <option value="ACCOUNTANT">Accountant</option>
                                <option value="OPD">OPD</option>
                                <option value="WARD">WARD</option>
                                <option value="LAB">LAB</option>
                                <option value="ADMIN" selected="">Administrator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>NIC</label>
                            <input type="text"  name="nic" class="form-control" placeholder="NIC" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pword" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="d-sm-flex justify-content-between">
                            <div class="form-check col-md-6 text-sm-left text-center">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <div class="forgot col-md-6 text-sm-right text-center">
                                <a href="forgot.html">forgot password?</a>
                            </div>
                        </div>
                        <button type="submit" name="btnLogin" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Login</button>
                    </form>

                </div>

                <!-- Copyright -->
                <?php include './_footer.php'; ?>
                <!--// Copyright -->
            </div>
        </div>


        <!-- Required common Js -->
        <script src='js/jquery-2.2.3.min.js'></script>
        <!-- //Required common Js -->

        <!-- Js for bootstrap working-->
        <script src="js/bootstrap.min.js"></script>
        <!-- //Js for bootstrap working -->

    </body>

</html>