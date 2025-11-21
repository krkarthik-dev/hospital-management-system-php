<?php
session_start();
include "../inc/navbar.php";
include "../inc/sidebar.php";
include "../inc/connect.php";
error_reporting(0);
$sql = "SELECT * FROM `booking_tab`";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/HMS/css/registerstyle.css">
  <link rel="stylesheet" href="/HMS/css/tabstyle.css">
  <title>Appointment log</title>
  <style>
    .reg{
      margin-top: -60%;
    }
  </style>
</head>

<body>
  <div class="reg">
    <div class="container">
      <!-- <div class="content"><br> -->
        <h3>Booked Appointments</h3><br>
        <table class="tab" id="myTable">
          <tr>
            <th>Booking ID</th>
            <th>Doctor</th>
            <th>Time</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
          <?php
          while ($rows = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              <td><b><?php echo $rows['b_id']; ?></b></td>
              <th><?php echo $rows['dname']; ?></th>
              <th><?php echo $rows['time']; ?></th>
              <th><?php echo $rows['date']; ?></th>
              <?php if ($rows['b_status'] == 1) { ?>
                <th><a href="cancel.php?bkid=<?php echo $rows['b_id']; ?>">Cancel</a></th>
              <?php } else { ?>
                <th>Attended</th>
              <?php } ?>
            </tr>
          <?php
          }
          ?>
        </table>
      <!-- </div> -->
    </div>
  </div>
</body>

</html>