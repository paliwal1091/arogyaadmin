
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
                include_once '../_tree_doctor.php';
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
                    <h4>  My Availability</h4>
                    <hr>

                    <div class="row">

                        <div class="col-md-6">

                            <?php
                            if (isset($_POST['btnAdd'])) {
                                $sql = "INSERT INTO hms_doctor_availability
            (`doctor_id`,
             `day_available`,
             `from_time`,
             `to_time`)
VALUES ('" . $_SESSION['userbean']['id'] . "',
        '" . $_POST['day_available'] . "',
        '" . $_POST['from_time'] . "',
        '" . $_POST['to_time'] . "');";
//                                echo $sql;
                                setData($sql, TRUE);
                            }
                            ?>
                            <form action="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/doctor/my-availability.php" method="post">
                               <span class="mando-msg">* fields are mandatory</span>
                                <table border="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>From </th>
                                            <th>To </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="mando-msg">*</span>
                                                <select required="" id="day_available" name="day_available" class="select form-control">
                                            <option value="">--select date--</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select></td>
                                           <td><span class="mando-msg">*</span><input type="time" name="from_time" required="" class="form-control"/></td>
                                            <td><span class="mando-msg">*</span><input type="time" name="to_time" required="" class="form-control"/></td>
                                            <td><input type="submit" name="btnAdd"  required="" class="btn btn-primary"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                        </div>
                        <div class="col-md-6">


                            <?php
                            if (isset($_GET['flag'])) {
                                $sql = "DELETE FROM hms_doctor_availability WHERE doctor_id = '". $_SESSION['userbean']['id']."' AND day_available = '".$_GET['day_available']."'";
                                setDelete($sql);
                            }
                            ?>


                            <?php
                            $sql = "SELECT * FROM hms_doctor_availability WHERE doctor_id = '" . $_SESSION['userbean']['id'] . "'";
                            $data = getData($sql);
                            ?>
                            <table border="0" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>From Time</th>
                                        <th>To Time</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($data!=null)
                                    foreach ($data as $value) {
                                        ?>
                                        <tr>
                                            <td><?= $value['day_available'] ?></td>
                                            <td><?= $value['from_time'] ?></td>
                                            <td><?= $value['to_time'] ?></td>
                                            <td><a class="btn btn-danger btn-sm" href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/doctor/my-availability.php?flag=DELETE&day_available=<?= $value['day_available'] ?>">remove</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
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