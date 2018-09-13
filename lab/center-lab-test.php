
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
                include_once '../_tree_lab.php';
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
                    if (isset($_POST['btnsubmit'])) {
                        $sql = "INSERT INTO `hms_lab_test`
            (`lab_test`,
             `center_id`,
             `description`,
             `test_cost`)
VALUES ('" . $_POST['lab_test'] . "',
        '" . $_POST['center_id'] . "',
        '" . $_POST['description'] . "',
        '" . $_POST['test_cost'] . "');";
                        setData($sql, TRUE);
                    }

                    if (isset($_GET['id'])) {
                        $sql = "DELETE FROM hms_lab_test WHERE id = '" . $_GET['id'] . "'";
                        setDelete($sql);
                    }
                    ?>


                    <div class="row">
                        <div class="col-md-4">
                            <form class="form-horizontal" action="center-lab-test.php" method="post">
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">Center Name</label> 
                                    <div class="col-xs-8">
                                        <select id="select" name="center_id" class="select form-control">
                                            <option value="">--select center--</option>
                                            <?php
                                            $sql = "SELECT * FROM hms_center";
                                            $data = getData($sql);
                                            if ($data != null) {
                                                foreach ($data as $value) {
                                                    ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['center_name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">Test Name</label> 
                                    <div class="col-xs-8">
                                        <input id="text" name="lab_test" type="text" class="form-control">

                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">Description</label> 
                                    <div class="col-xs-8">
                                        <textarea name="description" class="form-control">
                                        </textarea>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">Amount</label> 
                                    <div class="col-xs-8">
                                        <input id="text" name="test_cost" type="text" class="form-control">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="btnsubmit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">





                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Center Name</th>
                                        <th>Test Name</th>
                                        <th>Cost</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT hms_lab_test.*,hms_center.center_name FROM hms_lab_test INNER JOIN hms_center
ON hms_lab_test.center_id = hms_center.id";
                                    $data = getData($sql);
                                    if ($data != null) {
                                        foreach ($data as $value) {
                                            ?>
                                            <tr>
                                                <td><?= $value['center_name'] ?></td>
                                                <td><?= $value['lab_test'] ?></td>
                                                <td><?= $value['test_cost'] ?></td>
                                                <td><?= $value['description'] ?></td>
                                                <td><a href="center-lab-test.php?id=<?= $value['id'] ?>">remove</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
                            <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
                            <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
                            </script>

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