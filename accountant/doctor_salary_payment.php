
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
                include_once '../_tree_accountant.php';
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
                    <h4>Doctor Salary</h4>
                    <hr>

                    <?php
                    if (isset($_POST['btnPay'])) {
                        $sql = "INSERT INTO `hms_doctor_salary`
            (`doctor_id`,
             `salary_month`,
             `salary_amount`,
             `created_user`)
VALUES ('" . $_POST['doctor_id'] . "',
        '" . $_POST['salary_month'] . "',
        '" . $_POST['salary_amount'] . "',
        '" . $_SESSION['userbean']['id'] . "');";
                        setData($sql, TRUE);
                        ?>
                        <?php
                    }
                    ?>
 <a href="doctor_salary_payment_history.php" class="btn-sm btn-warning">view history</a>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" action="doctor_salary_payment.php" method="post">
                                <div class="form-group">
                                    <label for="select" class="control-label col-xs-4">Doctor</label> 
                                    <div class="col-xs-8">
                                        <select id="select" name="doctor_id" class="select form-control">
                                            <option value="">--select doctor--</option>
                                            <?php
                                            $sql = "SELECT * from hms_doctor";
                                            $data = getData($sql);
                                            if ($data != null) {
                                                foreach ($data as $value) {
                                                    ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['first_name'] ?> <?= $value['last_name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">Month</label> 
                                    <div class="col-xs-8">
                                        <input id="text" name="month_year" type="month" class="form-control">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="addDocSalary" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3>Completed Appointment</h3>
                            <table border="1" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Date Time</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_salary = 0;
                                    if (isset($_POST['addDocSalary'])) {
                                        echo $_POST['month_year'];
                                        $sql = "SELECT * FROM hms_doctor_appointment WHERE appointment_date LIKE '%" . $_POST['month_year'] . "%' AND doctor_id = '" . $_POST['doctor_id'] . "' AND status_code = 'ACCEPT'";
//                                        echo $sql;
                                        $data0 = getData($sql);
                                        if ($data0 != null) {
                                            foreach ($data0 as $value0) {
                                                ?>
                                                <tr>
                                                    <td><?= $value0['appointment_date'] ?></td>
                                                    <td><?= $value0['doctor_fee'] ?>
                                                        <?php $total_salary = $total_salary + $value0['doctor_fee']; ?>
                                                    </td>
                                                    <td><?= $value0['status_code'] ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>


                            <?php if ($total_salary != 0) {
                                ?>
                                <form action="doctor_salary_payment.php" method="post">
                                    <input type="hidden" name="doctor_id" value="<?= $_POST['doctor_id'] ?>" />
                                    <table>
                                        <tr>
                                            <td>Month</td>
                                            <td><input type="text" readonly="" value="<?= $_POST['month_year'] ?>" name="salary_month" /></td>
                                        </tr>
                                        <tr>
                                            <td>Salary Amount</td>
                                            <td><input type="text" readonly="" value="<?= $total_salary ?>" name="salary_amount" /></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="submit" value="submit" name="btnPay"/></td>
                                        </tr>
                                    </table>
                                </form>


                            <?php }
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