<h2 style="text-align: center">WARD</h2>
<hr>
<table border="0" style="width: 100%;padding: 5px">
    <tbody>
        <tr style="text-align: center">
      
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/ward/ambulance_request.php">
                  <i class="fas fas fa-ambulance fa-5x"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/ward/my-transport-request.php">
                  <i class="fas fa-laptop fa-5x"></i>
                </a>
            </td>
            <td>
                <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/ward/report-transport-request.php">
                     <i class="fas fa-file-alt fa-5x  tile-icon"></i>
                </a>
            </td>
        </tr>
        <tr style="text-align: center">
            <td>Ambulance Request</td>
            <td>My Transport Request</td>
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