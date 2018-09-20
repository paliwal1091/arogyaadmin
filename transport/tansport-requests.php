 
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
                include_once '../_tree_transport.php';
                ?>
            </nav>

            <!-- Page  Content Holder -->
            <div id="content">
                <!-- top-bar -->
                <?php include_once '../_top_bar.php'; ?>
                <!--// top-bar -->

                <!-- main-heading -->
                <!--// main-heading -->
                <!-- Page Content -->
                <div class="blank-page-content">
                    <h4>  Transport Requests </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">

                            <?php
                            if (isset($_POST['submitApprove'])) {
                                $flag_unique = $_POST['datetime_need'].'-'.$_POST['vehicle_id'];
                                $sql = "UPDATE hms_vehicle_request SET vehicle_id = '" . $_POST['vehicle_id'] . "', status_code='COMPLETE',flag_unique = '".$flag_unique."', driver_name ='" . $_POST['driver_name'] . "' WHERE id = '" . $_POST['id'] . "'";
//                                echo $sql;
                                setUpdate($sql, TRUE);
                            }
                            
                            if (isset($_POST['submitReject'])) {
                                echo  $_POST['id'];
                               
                                $sql = "UPDATE hms_vehicle_request SET  status_code='REJECT' WHERE id = '" . $_POST['id'] . "'";
//                                echo $sql;
                                setUpdate($sql, TRUE);
                            }
                            ?>

                            <span class="mando-msg">* fields are mandatory</span>
                        </div>
                        <div class="col-md-12">
                            <?php
                            $sqlv = "SELECT * FROM hms_vehicle WHERE status_code = 'ACTIVE' ";
                            $data0 = getData($sqlv);
                            ?>
                            <table border="1" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Response</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT A.id,A.datetime_need,A.comment,A.status_code,(SELECT vehicle_number FROM hms_vehicle WHERE id = A.vehicle_id) AS vehicle_number,A.driver_name
FROM hms_vehicle_request AS A";
                                    $data = getData($sql);
                                    if ($data != null) {
                                        foreach ($data as $value) {
                                            ?>
                                            <tr>
                                                <td><?= $value['datetime_need'] ?></td>
                                                <td><?= $value['comment'] ?></td>
                                                <td><?= $value['status_code'] ?></td>
                                                <td><?php if ($value['status_code'] == 'PENDING') {
                                                ?>
                                                        <form action="tansport-requests.php" method="post">
                                                            <input type="hidden" name="id" value="<?= $value['id'] ?>" />
                                                            <input type="hidden" name="status_code" value="COMPLETE" />
                                                            <input type="hidden" name="datetime_need" value="<?= $value['datetime_need']?>" />
                                                            Vehicle <select name="vehicle_id" required="">
                                                                <option value="">--select--</option>
                                                                <?php
                                                                foreach ($data0 as $valuex) {
                                                                    ?> <option value="<?= $valuex['id'] ?>"><?= $valuex['vehicle_number'] ?></option> <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <input type="text" name="driver_name" placeholder="Driver Name" required=""/>
                                                            <button name="submitApprove" type="submit" class="btn btn-success btn-sm">COMPLETE</button>
                                                        </form>

                                                    <form action="tansport-requests.php" method="post">
                                                            <input type="hidden" name="id" value="<?= $value['id'] ?>" />
                                                            <input type="hidden" name="status_code" value="REJECT" />
                                                            <button name="submitReject" type="submit" class="btn btn-danger btn-sm">REJECT</button>
                                                        </form>
                                                        <?php }else{
     echo $value['vehicle_number'] .' - '.$value['driver_name'];
                                                        }
                                                    ?></td>
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