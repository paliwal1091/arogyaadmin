<?php
session_start();
include './DB.php';
?>
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
                    include_once './_tree_accountant.php';
                } else if ($_SESSION['userbean']['user_role'] == 'ADMIN') {
                    include_once './_tree_admin.php';
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
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <!-- top-bar -->
                <?php include_once './_top_bar.php'; ?>
                <!--// top-bar -->

                <!-- main-heading -->
                <!--// main-heading -->
                <!-- Page Content -->
                <div class="blank-page-content">



                    <div class="row">
                        <div class="col-md-2"> 

                            <?php // $this->load->view('admin/_tree_admin');   ?>
                        </div>
                        <div class="col-md-5">


                            <div class="panel panel-warning">
                                <div class="panel-heading ">
                                    <h4>Profile</h4>
                                </div>

                                <?php
                                if (isset($_POST['btnChangeInfo'])) {
                                    $sql = "UPDATE `hms_user`
SET `first_name` = '" . $_POST['first_name'] . "',
  `last_name` = '" . $_POST['last_name'] . "',
  `nic` = '" . $_POST['nic'] . "',
  `telephone` = '" . $_POST['telephone'] . "',
  `email` = '" . $_POST['email'] . "'
WHERE `id` = '" . $_POST['id'] . "'";
                                    setUpdate($sql, TRUE);
                                    $_SESSION['userbean']['first_name'] = $_POST['first_name'];
                                    $_SESSION['userbean']['last_name'] = $_POST['last_name'];
                                    $_SESSION['userbean']['nic'] = $_POST['nic'];
                                    $_SESSION['userbean']['telephone'] = $_POST['telephone'];
                                    $_SESSION['userbean']['email'] = $_POST['email'];
                                }



                                if (isset($_POST['btnChangePass'])) {
                                    $new_password = $_POST['new_password'];
                                    $retype_password = $_POST['retype_password'];
                                    if (strlen($new_password) >= 6 && ($new_password == $retype_password)) {


                                        $sqlRead = "SELECT * FROM hms_user WHERE id = '" . $_POST['id'] . "' AND pword = PASSWORD('" . $_POST['old_password'] . "');";
                                        $data = getData($sqlRead);
                                        if ($data != null) {
                                            $sql = "UPDATE `hms_user`
SET 
  `pword` = PASSWORD('" . $_POST['new_password'] . "')
WHERE `id` = '" . $_SESSION['userbean']['id'] . "' AND pword = PASSWORD('" . $_POST['old_password'] . "');";
//                                            echo $sql;
                                            setUpdate($sql, TRUE);
                                        } else {
                                            echo 'Invalid password';
                                        }
                                    } else {
                                        echo 'Invalid password constrains';
                                    }
                                }
                                ?>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="profile.php" method="post">
                                        <input type="hidden" name="id" value="<?= $_SESSION['userbean']['id'] ?>" />
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">First Name</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="first_name" type="text" class="form-control"  value="<?= $_SESSION['userbean']['first_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-xs-4">Last Name</label> 
                                            <div class="col-xs-8">
                                                <input id="text1" name="last_name" type="text" class="form-control"  value="<?= $_SESSION['userbean']['last_name'] ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="text2" class="control-label col-xs-4">NIC </label> 
                                            <div class="col-xs-8">
                                                <input id="text2" name="nic" type="text" class="form-control" readonly="" value="<?= $_SESSION['userbean']['nic'] ?>" >
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="" class="control-label col-xs-4">User Role</label> 
                                            <div class="col-xs-8">
                                                <input id="" name="" type="user_role" class="form-control" readonly="" value="<?= $_SESSION['userbean']['user_role'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">Telephone</label> 
                                            <div class="col-xs-8">
                                                <input id="text3" name="telephone" type="text" class="form-control" value="<?= $_SESSION['userbean']['telephone'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">Email</label> 
                                            <div class="col-xs-8">
                                                <input id="text3" name="email" type="text" class="form-control" value="<?= $_SESSION['userbean']['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">Employee Number</label> 
                                            <div class="col-xs-8">
                                                <input id="text4" name="empno" type="text" class="form-control"  value="<?= $_SESSION['userbean']['id'] ?>"  readonly=""> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text5" class="control-label col-xs-4">Status</label> 
                                            <div class="col-xs-8">
                                                <input id="text4" name="status_code" type="text" class="form-control"  value="<?= $_SESSION['userbean']['status_code'] ?>" readonly="" > 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text6" class="control-label col-xs-4">Created Date</label> 
                                            <div class="col-xs-8">
                                                <input id="text6" name="text6" type="text" class="form-control" readonly="" value="<?= $_SESSION['userbean']['created_date'] ?>">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnChangeInfo" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">

                            <h3>Change Password </h3>
                            <form class="form-horizontal" action="profile.php"  method="post" >
                                <input type="hidden" name="id" value="<?= $_SESSION['userbean']['id'] ?>" />

                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">Old Password</label> 
                                    <div class="col-xs-8">
                                        <input id="text" name="old_password" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-xs-4">New Password</label> 
                                    <div class="col-xs-8">
                                        <input id="text1" name="new_password" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text2" class="control-label col-xs-4">Retype Password</label> 
                                    <div class="col-xs-8">
                                        <input id="text2" name="retype_password" type="password" class="form-control">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="btnChangePass" type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-1"></div>
                    </div>


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