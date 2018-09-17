<h2 style="text-align: center">Doctor</h2>
<hr>
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
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/doctor/report-appointment.php">
                  <i class="fas fa-file-alt fa-5x  tile-icon"></i>
                </a>
            </td>
        </tr>
        <tr style="text-align: center">
            <td>My Availability</td>
            <td>View Appointment</td>
            <td>Patient List</td>
            <td>Report</td>
        </tr>
    </tbody>
</table>