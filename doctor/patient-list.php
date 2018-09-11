
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
                    <h4>  View Appointments </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-8">
                            <table id="example" class="display table-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Telephone</th>
                                        <th>Date of Birth</th>
                                        <th>Email</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM  hms_patient ";
                                    $data = getData($sql);

                                    if ($data != null)
                                        foreach ($data as $row) {
                                            ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['first_name']; ?></td>
                                                <td><?= $row['last_name']; ?></td>
                                                <td><?= $row['telephone']; ?></td>
                                                <td><?= $row['dob']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['created_date']; ?></td>
                                                <td>

                                                    <a href="patient-list.php?patient_id=<?= $row['id']; ?>">history</a>
                                                    <a href="#" class=" nav-link btn-warning btn-sm">Reloead</a>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                                                        <h3>Patient History</h3>

                            <?php
                            if (isset($_GET['patient_id'])) {
                                $sql = "SELECT hms_doctor_appointment.doctor_comment,hms_doctor_appointment.created_date,hms_doctor_appointment.id,
CONCAT(hms_doctor.first_name,'',hms_doctor.last_name) AS doc_name
FROM hms_doctor_appointment 
INNER JOIN hms_doctor 
ON hms_doctor_appointment.doctor_id = hms_doctor.id
WHERE hms_doctor_appointment.patient_id =  '" . $_GET['patient_id'] . "' ORDER BY hms_doctor_appointment.id DESC ";
//                            echo $sql;
                                $resultData = getData($sql);

                                if ($resultData != null)
                                    foreach ($resultData as $value) {
                                        ?>
                            
                            <table border="" style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td><?= $value['doctor_comment'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?= $value['id'] ?> <?= $value['created_date'] ?> <?= $value['doc_name'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <?php
                                    }
                            }
                            ?>
                        </div>
                    </div>


                    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
                    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
                    </script>






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