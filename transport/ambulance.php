 
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
                    <h4> Ambulance </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">

                            <?php
                            if (isset($_POST['btnsubmit'])) {
                                $sql = "INSERT INTO hms_vehicle
            (`vehicle_number`)
VALUES ( '" . $_POST['vehicle_number'] . "');";
                                setData($sql, TRUE);
                            }
                            
                            if (isset($_GET['id'])){
                                $sql = "UPDATE hms_vehicle SET status_code = '".$_GET['status_code']."'  WHERE id = '".$_GET['id']."'";
                                echo $sql;
                                setUpdate($sql, TRUE);
                            }
                            
                            
                            ?>


                            <div class="panel panel-warning">
                                <div class="panel-heading ">Vehicle Management</div>
                                <div class="panel-body">
                                    <span class="mando-msg">* fields are mandatory</span>
                                    <form class="form-horizontal" action="ambulance.php" method="post">
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Vehicle Number</label> 
                                            <div class="col-xs-8"> <span class="mando-msg">*</span>
                                                <input id="text" name="vehicle_number" required="" type="text" class="form-control">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnsubmit" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>






                        </div>
                        <div class="col-md-8">

                            <div class="panel panel-warning">
                                <div class="panel-heading ">Vehicle List</div>
                                <div class="panel-body">
                                    
                            <table border="1" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Vehicle Number</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM hms_vehicle ";
                                    $data = getData($sql);
                                    if ($data != null) {
                                        foreach ($data as $value) {
                                            ?>
                                            <tr>
                                                <td><?= $value['vehicle_number'] ?></td>
                                                <td><?= $value['status_code'] ?></td>
                                                <td>
                                                    
                                                    <?php 
                                                    $status_code = '';
                                                    if($value['status_code'] == 'ACTIVE'){ $status_code = 'DEACTIVE';}
                                                    if($value['status_code'] == 'DEACTIVE'){$status_code = 'ACTIVE';}
                                                    ?>
                                                    <a class="btn btn-warning btn-sm" href="ambulance.php?id=<?= $value['id'] ?>&status_code=<?= $status_code?>">Set <?= $status_code?> </a>
                                                </td>
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