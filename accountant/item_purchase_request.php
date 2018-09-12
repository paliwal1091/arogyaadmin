
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
                    <h4>Item Purchase</h4>
                    <hr>
                    <?php
                    if (isset($_POST['btnAccept'])) {
                        $sql = "UPDATE FROM hms_purchase SET amount = '".$_POST['amount']."',updated_by='".$_SESSION['userbean']['id']."' WHERE id = '".$_POST['id']."'";
                    }
                    if (isset($_POST['btnReject'])) {
                        $sql = "UPDATE FROM hms_purchase SET comment = '".$_POST['comment']."',updated_by='".$_SESSION['userbean']['id']."' WHERE id = '".$_POST['id']."'";
                    }
                    ?>

                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>qty</th>
                                <th>status_code</th>
                                <th></th>
                                <th>amount</th>
                                <th>created_date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from hms_purchase";
                            $data = getData($sql);
                            if ($data != null) {
                                foreach ($data as $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['purchasing_item'] ?></td>
                                        <td><?= $value['qty'] ?></td>
                                        <td><?= $value['status_code'] ?></td>
                                        <td><?php if ($value['status_code'] == 'PENDING') {
                                ?> 
                                                <form action="item_purchase_request.php" method="post">
                                                    <input type="text" name="amount" required="" placeholder="amount" />
                                                    <input type="hidden" name="id" value="<?= $value['id'] ?>" />
                                                    <input type="submit" name="btnAccept" class="btn-sm btn-success" />
                                                </form>
                                                <form action="item_purchase_request.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $value['id'] ?>" />
                                                    <input type="text" name="comment" required="" placeholder="Reject Reson" />
                                                    <input type="submit" name="btnReject" class="btn-sm btn-danger" />
                                                </form>
                                                <?php
                                            }
                                            ?></td>
                                        <td><?= $value['amount'] ?></td>
                                        <td><?= $value['created_date'] ?></td>
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