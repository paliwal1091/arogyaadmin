
<?php
session_start();
include '../DB.php';
include '../core.php';
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
                    <h4>  Appointment View</h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">

                            <?php
                            $patient_id = 0;
                            $appointmentDetails = getAppointmentDetails($_GET['id']);
                            foreach ($appointmentDetails as $value) {
                                $patient_id = $value['patient_id'];
                                ?>
                                <div id="printdiv">
                                    <table border="0" style="width: 100% ">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Arogya Hospital,Applointment Placement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $value['created_date'] ?></td>
                                                <td>Appointment No <?= $value['id'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Patient Details</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Patient Name</td>
                                                <td><?= $value['patient_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number</td>
                                                <td><?= $value['telephone'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Appointment Date</td>
                                                <td><?= $value['appointment_date'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Doctor Name</td>
                                                <td><?= $value['doc_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Doctor Fee</td>
                                                <td>Rs <?= $value['doctor_fee'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Hospital Fee</td>
                                                <td>Rs <?= $value['hospital_fee'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Amount</td>
                                                <td>Rs <?= $value['fee'] ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                echo $value['status_code'];
                                echo $value['doctor_comment'];
                                if ($value['status_code'] == 'OPEN') {
                                    ?> 
                                    <form class="form-horizontal" action="appointment-status-change.php" method="post">
                                        <input type="hidden" name="status_code" value="ACCEPT"/>
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>"/>
                                        <div class="form-group">
                                            <label for="textarea" class="control-label col-xs-4">Comment</label> 
                                            <div class="col-xs-8">
                                                <textarea id="textarea"  name="doctor_comment" cols="40" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnStatusChange" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <h3>or</h3>
                                    <form class="form-horizontal" action="appointment-status-change.php" method="post">
                                        <input type="hidden" name="status_code" value="REJECT"/>
                                        <input type="hidden" name="id" status_code ="<?= $value['id'] ?>"/>
                                        <input type="hidden" name="doctor_comment" value=""/>
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnStatusChange" type="submit" class="btn btn-danger">Reject</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                            }
                            ?>




                        </div>
                        <div class="col-md-8">


                            <?php
                            $sql = "SELECT hms_doctor_appointment.doctor_comment,hms_doctor_appointment.created_date,hms_doctor_appointment.id,
CONCAT(hms_doctor.first_name,'',hms_doctor.last_name) AS doc_name
FROM hms_doctor_appointment 
INNER JOIN hms_doctor 
ON hms_doctor_appointment.doctor_id = hms_doctor.id
WHERE hms_doctor_appointment.patient_id =  '". $patient_id."' ORDER BY hms_doctor_appointment.id DESC " ;
                            echo $sql;
                            $resultData = getData($sql);
                            
                            if ($resultData != null)
                                foreach ($resultData as $value) {
                                    ?>
                            <table border="">
                                        <tbody>
                                            <tr>
                                                <td><?= $value['doctor_comment']?></td>
                                            </tr>
                                            <tr>
                                                <td><?= $value['id']?> <?= $value['created_date']?> <?= $value['doc_name']?></td>
                                            </tr>
                                        </tbody>
                                </table>
<br>
                                    <?php
                                }
                            ?>



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