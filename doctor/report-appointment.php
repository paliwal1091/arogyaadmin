<?php session_start();
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
                    <div class="row">
                        <div class="col-md-12">
 <div style="width: 50%">
                            <form class="form-horizontal" action="report-appointment.php" method="post">
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">From Date</label> 
                                    <div class="col-xs-8">
                                        <input id="text" name="from_date" type="date" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-xs-4">To Date</label> 
                                    <div class="col-xs-8">
                                        <input id="text1" name="to_date" type="date" class="form-control">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
 </div>

                            <?php if(isset($_POST['btnSubmit'])){
                                ?>
                            <a href="#" class="btn btn-warning btn-sm" onclick="PrintElem('printdiv')">print</a>
                             <div id="printdiv">
                                 <table border="1" style="width: 100%">
                                     <thead>
                                         <tr>
                                             <th colspan="7" style="text-align: center">Appointment Report<br>
                                               From : <?= $_POST['from_date'] ?>
                                                 To : <?= $_POST['to_date'] ?> 
                                             </th>
                                          </tr>
                                     </thead>
                                     <thead>
                                         <tr>
                                             <th>Appointment NO</th>
                                             <th>Patient Name</th>
                                             <th>Appointment Date</th>
                                             <th>Status</th>
                                             <th>Doctor Fee</th>
                                             <th>Created Date</th>
                                         </tr>
                                     </thead>
                                     <tbody>

                                         <?php
                                         if (isset($_POST['btnSubmit'])) {
                                             $sql = "SELECT CONCAT(hms_patient.first_name,' ',hms_patient.last_name) AS patient_name,hms_doctor_appointment.* FROM hms_doctor_appointment
INNER JOIN hms_patient 
ON hms_doctor_appointment.patient_id = hms_patient.id  WHERE
 DATE(hms_doctor_appointment.created_date) >= '" . $_POST['from_date'] . "' AND DATE(hms_doctor_appointment.created_date) <= '" . $_POST['to_date'] . "' 
AND hms_doctor_appointment.doctor_id = '".$_SESSION['userbean']['id']."'";
                                                     
                                             $data = getData($sql);
                                             foreach ($data as $value) {
                                                 ?>
                                                 <tr>
                                                     <td><?= $value['id'] ?></td>
                                                     <td><?= $value['patient_name'] ?></td>
                                                     <td><?= $value['appointment_date'] ?></td>
                                                     <td><?= $value['status_code'] ?></td>
                                                     <td><?= $value['doctor_fee'] ?></td>
                                                     <td><?= $value['created_date'] ?></td>
                                                 </tr>
                                                 <?php
                                             }
                                         }
                                         ?>
                                     </tbody>
                                 </table>
                             </div>
                            <?php
                            }?>
                             
                        </div>
                    </div>
                </div>
                
                
  <script type="text/javascript">
                        function PrintElem(elem)
                        {
                            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                            mywindow.document.write('<html><head><title>' + document.title + '</title>');
                            mywindow.document.write('</head><body >');
                            mywindow.document.write('<h1>' + document.title + '</h1>');
                            mywindow.document.write(document.getElementById(elem).innerHTML);
                            mywindow.document.write('</body></html>');

                            mywindow.document.close(); // necessary for IE >= 10
                            mywindow.focus(); // necessary for IE >= 10*/

                            mywindow.print();
                            mywindow.close();

                            return true;
                        }
                    </script>

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

    </body>

</html>