<ul class="list-unstyled components">
    <li>
        <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/home.php">
            <i class="fas fa-th-large"></i>
            Dashboard
        </a>
    </li>
    <li>
        <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/opd-appointment.php" >
            <i class="fas fa-laptop"></i>
           OPD Appointment
        </a>
    </li>
    <li>
        <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/opd-patient-details.php" >
            <i class="fas fa-users"></i>
          Patients List
        </a>
    </li>
  
    <li>
        <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/opd_ambulance_request.php" >
            <i class="fas fa-ambulance"></i>
         Ambulance Request
        </a>
    </li>
      <li>
        <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/my-transport-request.php" >
            <i class="fas fa-list"></i>
         My Ambulance Request
        </a>
    </li>
    
    <li>
        <a href="<?php $_SERVER['SERVER_NAME'] ?>/<?= $_SESSION['sitename'] ?>/opd/report-opd-appointment.php">
            <i class="fas fa-th"></i>
            Reports
        </a>
    </li>
</ul>

