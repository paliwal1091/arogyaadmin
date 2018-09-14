
<?php
session_start();
include '../DB.php';
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Style-sheets -->
        <!-- Bootstrap Css -->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap Css -->
        <!-- Common Css -->
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--// Common Css -->
        <!-- Nav Css -->
        <link rel="stylesheet" href="../css/style4.css">
        <!--// Nav Css -->
        <!-- Fontawesome Css -->
        <link href="../css/fontawesome-all.css" rel="stylesheet">
        <!--// Fontawesome Css -->
        <!--// Style-sheets -->


    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h1>
                        <a href="#">Arogya</a>
                    </h1>
                    <span>M</span>
                </div>
                <div class="profile-bg"></div>
                <?php
                include_once '../_tree_admin.php';
                ?>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <!-- top-bar -->
                <?php include_once '../_top_bar.php'; ?>
                <!--// top-bar -->

                <!-- main-heading -->
                <!--// main-heading -->
                <!-- Page Content -->
                <div class="blank-page-content">
                    <h4>User Registration</h4>
                    <hr>
                    <div class="row">

                        <?php
                        if (isset($_POST['btnUpdate'])) {

                            $sqlUpdate = "UPDATE hms_user
SET `first_name` = '" . $_POST['first_name'] . "',
  `last_name` = '" . $_POST['last_name'] . "',
  `user_role` = '" . $_POST['user_role'] . "',
  `telephone` = '" . $_POST['telephone'] . "',
  `email` = '" . $_POST['email'] . "',
  `status_code` = '" . $_POST['status_code'] . "'
WHERE `id` = '" . $_POST['id'] . "';";
                            setUpdate($sqlUpdate, TRUE);
                        } else if (isset($_POST['btnRestPass'])) {
                            $sqlUpdate = "UPDATE hms_user
SET `pword` = PASSWORD('" . $_POST['nic'] . "') 
WHERE `id` = '" . $_POST['id'] . "';";
                           // echo $sqlUpdate;
                            setUpdate($sqlUpdate, TRUE);
                        }
                        ?>
                        <div class="col-md-8">

                            <?php
                            if (isset($_GET['id'])) {
                                $sqlSelect = "SELECT * FROM hms_user WHERE id = " . $_GET['id'];
                                $data = getData($sqlSelect);
                                foreach ($data as $row) {
                                    ?>
                                    <form class="form-horizontal" action="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/admin/user-registration-update.php" method="post">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id"  />
                                        <span class="mando-msg">* fields are mandatory</span>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">First Name <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="first_name" type="text"  required="" class="form-control" value="<?php echo $row['first_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-xs-4">Last Name <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text1" name="last_name" type="text" required="" class="form-control" value="<?php echo $row['last_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-xs-4">NIC <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text2" name="nic" type="text" required="" class="form-control" readonly="" value="<?php echo $row['nic'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="select" class="control-label col-xs-4">User Role <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <select id="select" name="user_role" required="" class="select form-control">
                                                    <option value="">--select--</option>
                                                    <?php
                                                    $sql = "SELECT * FROM hms_user_role WHERE user_role != 'PATIENT' AND user_role != 'DOCTOR'";
                                                    $data = getData($sql);
                                                    foreach ($data as $value) {
                                                        ?> <option  <?php
                                                        if ($value['user_role'] == $row['user_role']) {
                                                            echo 'selected=""';
                                                        }
                                                        ?>  value="<?php echo $value['user_role'] ?>"><?php echo $value['description'] ?></option> <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">Telephone</label> 
                                            <div class="col-xs-8">
                                                <input id="text3" name="telephone" type="text" class="form-control" value="<?php echo $row['telephone'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text4" class="control-label col-xs-4">Email</label> 
                                            <div class="col-xs-8">
                                                <input id="text4" name="email" type="text" class="form-control" value="<?php echo $row['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text5" class="control-label col-xs-4">Employee No <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text5" name="empno" readonly="" type="text" required="" class="form-control" value="<?php echo $row['id'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="select1" class="control-label col-xs-4">Status</label> 
                                            <div class="col-xs-8">
                                                <select id="select1" name="status_code" class="select form-control">
                                                    <option value="ACTIVE"  <?php
                                                    if ('ACTIVE' == $row['status_code']) {
                                                        echo 'selected=""';
                                                    }
                                                    ?> >ACTIVE</option>
                                                    <option value="DEACTIVE"  <?php
                                                    if ('DEACTIVE' == $row['status_code']) {
                                                        echo 'selected=""';
                                                    }
                                                    ?> >DEACTIVE</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnUpdate" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                            }
                            ?>




                        </div>

                        <div class="col-md-4">
                            <h3>Change Password </h3>
                            <?php
                            if (isset($_GET['id'])) {
                                $sqlSelect = "SELECT * FROM hms_user WHERE id = " . $_GET['id'];
                                $data = getData($sqlSelect);
                                foreach ($data as $row) {
                                    ?>
                                    <form class="form-horizontal" action="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/admin/user-registration-update.php"  method="post" >
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                        <input type="hidden" name="nic" value="<?php echo $row['nic'] ?>" />
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnRestPass" type="submit" class="btn btn-primary">Reset Password</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                            }
                            ?>




                        </div>
                    </div>



                    <table id="example" class="display table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>NIC</th>
                                <th>User Role</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>EMPNO</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = " SELECT * FROM hms_user ";
                            $resultx = getData($sql);
                            if ($resultx != FALSE) {
                                while ($row = mysqli_fetch_assoc($resultx)) {
                                    ?>

                                    <tr>
                                        <td><?= $row['first_name'] ?></td>
                                        <td><?= $row['last_name'] ?></td>
                                        <td><?= $row['nic'] ?></td>
                                        <td><?= $row['user_role'] ?></td>
                                        <td><?= $row['telephone'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['status_code'] ?></td>
                                        <td><?= $row['created_date'] ?></td>
                                        <td><a class="btn btn-success btn-sm" href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/admin/user-registration-update.php?id=<?= $row['id'] ?>">update</a></td>

                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>


                </div>

                <!--// Page Content -->

                <!-- Copyright -->
                <?php include '../_footer.php'; ?>
                <!--// Copyright -->
            </div>
        </div>


        <!-- Required common Js -->
        <script src='../js/jquery-2.2.3.min.js'></script>
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
        <script src="../js/bootstrap.min.js"></script>
        <!-- //Js for bootstrap working -->


        <link href="../css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>

</html>