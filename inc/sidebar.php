<?php session_start();
$username = $_SESSION['user'];
?>
<style>
    .nav {
        height: 150%
    }

    .mt-0 {
        margin-top: 80% !important;
    }

    .mt-1 {
        margin-top: 15vh !important;
    }

    .nav .navbar-dark .nav-link {
        color: white;
    }

    .text {
        color: red;
        font-family: 'Times New Roman', Times, serif;
        font-size: 20;
        font-style: italic;
    }

    .nav .navbar-dark .nav-link:hover {
        color: lightcoral;
    }

    .pt-0 {
        padding-top: 60 !important;
    }
</style>
<?php if ($_SESSION['current_user'] == "admin") {
?>
    <div class="nav">
        <nav class="navbar flex-column w-24 p-3 d-inline-block bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav mt-0">
                    <li class="nav-item">
                        <h1 class="text">Hai, <?php echo $username; ?></h1>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a class="nav-link" href="/HMS/admin/admin.php">My Profile</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/admin/doctor_man.php">Doctor Details</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/admin/staff_man.php">Staff Details</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/admin/patient_man.php">Patient Details</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/admin/access_log.php">Access Log</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<?php } else if ($_SESSION['current_user'] == "staff") { ?>
    <div class="nav">
        <nav class="navbar flex-column w-24 p-3 d-inline-block bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav mt-0">
                    <li class="nav-item">
                        <h1 class="text">Hai, <?php echo $username; ?></h1>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a class="nav-link" href="/HMS/office/office.php">My Profile</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/admin/plist.php">Patient Details</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/office/addPatient.php">ADD Patient</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/office/med_man.php">Medicine Stock</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/office/appnt_log.php">Appointment</a>
                    </li>
                    <li class="nav-item pt-0">
                        <a class="nav-link" href="/HMS/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<?php } else if ($_SESSION['current_user'] == "patient") {
?>
    <nav class="navbar flex-column w-24 p-3 h-100 d-inline-block bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav mt-0">
                <li class="nav-item">
                    <h1 class="text">Hai, <?php echo $username; ?></h1>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/HMS/patient/patient.php">My Profile</a>
                </li>
                <li class="nav-item pt-0">
                    <a class="nav-link" href="\HMS\patient\booking.php">Book an Appointment</a>
                </li>
                <li class="nav-item pt-0">
                    <a class="nav-link" href="\HMS\patient\app_log.php">My Appointments</a>
                </li>
                <li class="nav-item pt-0">
                    <a class="nav-link" href="/HMS/patient/report.php">Report</a>
                </li>
                <li class="nav-item pt-0">
                    <a class="nav-link" href="/HMS/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
<?php } else if ($_SESSION['current_user'] == "doctor") {
?>
    <nav class="navbar flex-column w-24 p-3 h-100 d-inline-block bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav mt-0">
                <li class="nav-item">
                    <h1 class="text">Hai, <?php echo $username; ?></h1>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/HMS/doctor/doctor.php">My Profile</a>
                </li>
                <li class="nav-item pt-0">
                    <a class="nav-link" href="/HMS/doctor/appoinment_log.php">Appointment</a>
                </li>
                <li class="nav-item pt-0">
                    <a class="nav-link" href="/HMS/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
<?php } ?>