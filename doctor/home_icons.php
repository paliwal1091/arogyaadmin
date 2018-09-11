<h2>Doctor</h2>
<table border="0" style="width: 100%;padding: 5px">
    <tbody>
        <tr style="text-align: center">
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/doctor/my-availability.php">
                    <i class="fas fa-users  fa-5x  tile-icon"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/doctor/appointment-list.php">
                    <i class="fas fa-user-md fa-5x  tile-icon"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/doctor/patient-list.php">
                    <i class="fas fa-user fa-5x  tile-icon"></i>
                </a>
            </td>
        </tr>
        <tr style="text-align: center">
            <td>My Availability</td>
            <td>View Appointment</td>
            <td>Patient List</td>
        </tr>
    </tbody>
</table>