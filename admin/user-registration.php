
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
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--> 
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
                    <div class="row">
                        
                        <?php
                            if (isset($_POST['btnReg'])) {





                                $sql = " INSERT INTO `hmsdb`.`hms_user`
            (`first_name`,
             `last_name`,
             `nic`,
             `pword`,
             `user_role`,
             `telephone`,
             `email`,
             `status_code`,
             `created_user`)
VALUES ('" . $_POST['first_name'] . "',
        '" . $_POST['last_name'] . "',
        '" . $_POST['nic'] . "',
        PASSWORD('" . $_POST['nic'] . "'),
        '" . $_POST['user_role'] . "',
        '" . $_POST['telephone'] . "',
        '" . $_POST['email'] . "',
        '" . $_POST['status_code'] . "',
        '" . $_SESSION['userbean']['id'] . "'); ";
//                                echo $sql;
                                setData($sql, TRUE);
                            }
                            ?>
                        
                        
                        <div class="col-md-8">
                            <script>
                                function inputValidate() {
                                    var first_name = $.trim($('#first_name').val());
                                    var last_name = $.trim($('#last_name').val());
                                    var nic = $.trim($('#nic').val());

                                    if (first_name.length == 0) {
                                        alert('Invalid First Name');
                                           return false;
                                    }
                                    if (last_name.length == 0) {
                                        alert('Invalid First Name');
                                           return false;
                                    }

                                    if (nic.length >= 9 && nic.length <= 12) {
                                    } else {
                                        alert('Invalid NIC legnth');
                                        return false;
                                    }
//                                    alert(first_name);
                                    return true;
                                }
                            </script>

                            
                            
                            <div class="panel panel-primary">
                                <div class="panel-heading ">User Registration</div>
                                <div class="panel-body">
                                         <form class="form-horizontal"  onsubmit="return inputValidate()" action="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/admin/user-registration.php" method="post">
                                <span class="mando-msg">* fields are mandatory</span>
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">First Name <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-8">
                                        <input id="first_name" name="first_name" type="text"  required="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-xs-4">Last Name <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-8">
                                        <input id="last_name" name="last_name" type="text" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text2" class="control-label col-xs-4">NIC <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-8">
                                        <input id="nic" name="nic" type="number" required="" class="form-control" placeholder="Without V or X"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select" class="control-label col-xs-4">User Role <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-8">
                                        <select id="select" name="user_role" required="" class="select form-control">
                                            <option value="">--select--</option>
                                            <?php
                                            $sql = "SELECT * FROM hms_user_role WHERE user_role != 'PATIENT'  AND user_role != 'DOCTOR'";
                                            $data = getData($sql);
                                            foreach ($data as $value) {
                                                ?> <option   value="<?php echo $value['user_role'] ?>"><?php echo $value['description'] ?></option> <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text3" class="control-label col-xs-4">Telephone</label> 
                                    <div class="col-xs-8">
                                        <input id="text3" name="telephone" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text4" class="control-label col-xs-4">Email <span class="mando-msg">* </span></label> 
                                    <div class="col-xs-8">
                                        <input id="text4" name="email" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select1" class="control-label col-xs-4">Status <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-8">
                                        <select id="select1" name="status_code" class="select form-control">
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="DEACTIVE">DEACTIVE</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="btnReg" type="submit"  class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                            </div>
                       


                        </div>
                        <div class="col-md-4"></div>
                    </div>


                    <div class="panel panel-warning">
                        <div class="panel-heading ">User List</div>
                        <div class="panel-body">
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
                    </div>
              


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