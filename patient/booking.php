<?php
session_start();
include "../inc/navbar.php";
include "../inc/sidebar.php";
include "../inc/connect.php";
//error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $date = $_POST['date'];
  $time = $_POST['time'];
  $department = $_POST['Deptname'];
  $sql = "SELECT * FROM `dept_tab` WHERE dept_name='$department'";
  $sr = mysqli_query($conn, $sql);
  $r1 = mysqli_fetch_array($sr);
  $d_id=$r1['dept_id'];
  $doctor = $_POST['Drname'];
  $username = $_SESSION['patient'];
  $sql = "SELECT * FROM `booking_tab` WHERE date = '$date' && time = '$time' && dept = '$d_id' && dname = '$doctor' ";
  $query = mysqli_query($conn, $sql);
  $check = mysqli_fetch_array($query);
  $n = mysqli_num_rows($query);
  if ($n>=1){
    echo "<script> alert('time slot already booked'); </script>";
  } else {
    $sql1 = "INSERT INTO `booking_tab` (`username`,`dept`,`dname`,`time`,`date`) VALUES ('$username','$d_id','$doctor','$time','$date')";
    $query1 = mysqli_query($conn, $sql1);

    $_SESSION['bkid'] = $username;
    header("Location: appoinment.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/HMS/css/registerstyle.css">
  <title>Booking</title>
  <style>
    .reg{
      margin-top: -40%;
    }
  </style>
</head>

<body>
  <div class="reg">
    <div class="container">
      <div class="title">Appointment Booking</div>
      <div class="content">
        <?php
        if (!isset($_POST['deptnext']) and !isset($_POST['next'])) {
          $q1 = "SELECT * FROM `dept_tab`";
          $result = mysqli_query($conn, $q1); ?>
          <form action="booking.php" method="POST" class="form" name="form" enctype="multipart/form-data">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Department</span>
                <select type="select" name="dept" id="dept" required>
                  <option value="">Select One Department</option>
                  <?php
                  $q1 = "SELECT * FROM `dept_tab`";
                  $result = mysqli_query($conn, $q1);
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="button">
                <input type="submit" name="deptnext" id="deptnext" value="next">
              </div>
            </div>
          </form>
          <br>
        <?php
        }
        if (isset($_POST['deptnext'])) {
          $did = $_POST['dept'];
          $sql = "SELECT * FROM `dept_tab` WHERE dept_id='$did'";
          $sr = mysqli_query($conn, $sql);
          $r1 = mysqli_fetch_array($sr);
          $q2 = "SELECT * FROM `user_tab` WHERE `user_type`='doctor' AND `dept_id`='$did'";
          $result2 = mysqli_query($conn, $q2);

        ?>
          <form action="booking.php" method="POST" class="form" name="form" enctype="multipart/form-data">
            <div class="user-details">
              <div class="input-box">
              <span class="details">Department</span>
                <input type="text" name="deptname" value="<?php echo $r1['dept_name']; ?>">
              </div>
              <div class="input-box">
                <span class="details">Doctor</span>
                <select name="doctor" id="doctor" required>
                  <option value="">Choose Doctor</option>
                  <?php
                  while ($row2 = mysqli_fetch_array($result2)) {
                  ?>
                    <option value="<?php echo $row2['username']; ?>"><?php echo $row2['fname'] . " " . $row2['lname']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="button">
                <input type="submit" name="next" id="next" value="Next">
              </div>
            </div>
          </form>
        <?php }
        if (isset($_POST['next'])) {
          $dname = $_POST['deptname'];
          $usrname = $_POST['doctor'];
          $sql = "SELECT * FROM `user_tab` WHERE `user_type`='doctor' AND `username`='$usrname' AND status=1";
          $sr = mysqli_query($conn, $sql);
          $r1 = mysqli_fetch_array($sr);
        ?>
          <form action="booking.php" method="POST" class="form" name="form">
            <div class="user-details">
              <div class="input-box">
              <span class="details">Department</span>
                <input type="text" name="Deptname" value="<?php echo $dname ?>">
              </div>
              <div class="input-box">
                <span class="details">Doctor</span>
                <input type="text"  value="<?php echo $r1['fname'] . " " . $r1['lname']; ?>">
                <input type="text" style="display: none;" name="Drname" value="<?php echo $usrname; ?>">
              </div>
              <div class="input-box">
                <span class="details">Date</span>
                <input type="date" id="date" name="date" required>
                <script>
                  var todayDate = new Date();
                  var year = todayDate.getUTCFullYear();
                  var month = todayDate.getMonth() + 1;
                  var tdate = todayDate.getDate();
                  if (month < 10) {
                    month = "0" + month;
                  }
                  if (tdate < 10) {
                    tdate = "0" + tdate;
                  }
                  var date = year + "-" + month + "-" + tdate;
                  document.getElementById("date").setAttribute("min", date);
                  console.log(date);
                </script>
              </div>
              <br>
              <div class="gender-details">
            <input type="radio" name="time" value="09-10 AM" id="dot-1">
            <input type="radio" name="time" value="10-11 AM" id="dot-2">
            <input type="radio" name="time" value="11-12 PM" id="dot-3">
            <span class="gender-title">Time</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="time">09-10 AM</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="time">10-11 AM</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="time">11-12 PM</span>
              </label>
            </div>
          </div>
              <div class="button">
                <input type="reset" name="reset" value="Clear">
              </div>
              <div class="button">
                <input type="submit" name="submit" id="submit" value="Book">
              </div>
            </div>
          </form>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>