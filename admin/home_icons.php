<h2>Administrator</h2>
<table border="0" style="width: 100%;padding: 5px">
    <tbody>
        <tr style="text-align: center">
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/admin/user-registration.php">
                    <i class="fas fa-users  fa-5x  tile-icon"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/admin/doctor-registration.php">
                    <i class="fas fa-user-md fa-5x  tile-icon"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/admin/patient-registration.php">
                    <i class="fas fa-user fa-5x  tile-icon"></i>
                </a>
            </td>
        </tr>
        <tr style="text-align: center">
            <td>User Registration</td>
            <td>Doctor Registration</td>
            <td>Patient Registration</td>
        </tr>
    </tbody>
</table>