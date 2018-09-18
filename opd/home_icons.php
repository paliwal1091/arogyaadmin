<h2 style="text-align: center">OPD</h2>
<hr>
<table border="0" style="width: 100%;padding: 5px">
    <tbody>
        <tr style="text-align: center">
      
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/opd-appointment.php">
                  <i class="fas fa-laptop fa-5x"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/opd-patient-details.php">
                  <i class="fas fa-users fa-5x"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/opd_ambulance_request.php">
                  <i class="fas fa-ambulance fa-5x"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/my-transport-request.php">
                  <i class="fas fa-list fa-5x"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/report-opd-appointment.php">
                     <i class="fas fa-file-alt fa-5x  tile-icon"></i>
                </a>
            </td>
        </tr>
        <tr style="text-align: center">
            <td>OPD Appointment</td>
            <td>Patient List</td>
            <td>Ambulance</td>
            <td>My Ambulance Request</td>
            <td>Report</td>
        </tr>
    </tbody>
</table>

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