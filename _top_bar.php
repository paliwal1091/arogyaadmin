<nav class="navbar navbar-default mb-xl-5 mb-4">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <ul class="top-icons-agileits-w3layouts float-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <?php
                    if ($_SESSION['userbean']['user_role'] == 'DOCTOR') {
                        ?><span class="badge">
                        <?php 
                        $sql = "SELECT COUNT(*) AS cnt FROM hms_doctor_appointment WHERE status_code = 'OPEN' AND doctor_id = '". $_SESSION['userbean']['id']."'";
                        $data = getData($sql);
                        if($data != null){
                            foreach ($data as $value) {
                                echo $value['cnt'];
                            }
                        }
                        
                        ?>
                        </span><?php
                    } else if ($_SESSION['userbean']['user_role'] == 'ACCOUNTANT') {
//                    include_once './_tree_accountant.php';
                    } else if ($_SESSION['userbean']['user_role'] == 'ADMIN') {
//                    include_once './_tree_admin.php';
                    } else if ($_SESSION['userbean']['user_role'] == 'LAB') {
//                    include_once './_tree_lab.php';
                    } else if ($_SESSION['userbean']['user_role'] == 'OPD') {
//                    include_once './_tree_opd.php';
                    } else if ($_SESSION['userbean']['user_role'] == 'PHARMACIST') {
//                    include_once './_tree_pharmacist.php';
                    } else if ($_SESSION['userbean']['user_role'] == 'TRANSPORT') {
//                    include_once './_tree_transport.php';
                    } else if ($_SESSION['userbean']['user_role'] == 'WARD') {
//                    include_once './_tree_ward.php';
                    }
                    ?>

                </a>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
<?php echo $_SESSION['userbean']['user_role']; ?>
                </a>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu drop-3">
                    <div class="profile d-flex mr-o">
                        <div class="profile-l align-self-center">
                            <img src="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                        </div>
                        <div class="profile-r align-self-center">
                            <h3 class="sub-title-w3-agileits"><?php echo $_SESSION['userbean']['first_name']; ?></h3>
                            <a href="<?php echo $_SESSION['userbean']['email']; ?>"><?php echo $_SESSION['userbean']['email']; ?></a>
                        </div>
                    </div>
                    <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/profile.php" class="dropdown-item mt-3">
                        <h4>
                            <i class="far fa-user mr-3"></i>My Profile</h4>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>