<?php
session_start();
include "../inc/navbar.php";
include "../inc/sidebar.php";
include "../inc/connect.php";
// error_reporting(0);
$dname=$_SESSION['user'];
$tdate = date("Y-m-d");
$sql = "SELECT * FROM `booking_tab` AS b,`patient` as p,`dept_tab` as d,`user_tab` as u WHERE b.username=p.p_username AND b.dept=d.dept_id and b.dname=u.username and b.dname='$dname' and b.date='$tdate'";
$query = mysqli_query($conn, $sql);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  header("Location: appoinment.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/HMS/css/registerstyle.css">
  <title>Appointment Log</title>
  <style>
    .reg{
      margin-top: -40%;
    }
    table, th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}
  </style>
</head>

<body>
  <div class="reg">
    <div class="container">
      <div class="title">Appointments</div>
      <div class="content"><br>
        <h3>My Appointments</h3><br>
          <table class="tab" id="myTable" border="1" style="padding: 5px;">
    <tr>
       <th>Booking ID</th>
       <th>Patient Name</th>
       <th>Time</th>
       <th>Date</th>
       <th>Action</th>
    </tr>
<?php
while($rows = mysqli_fetch_assoc($query))
{
?>
    <tr>
       <td><b><?php echo $rows['b_id'];?></b></td>
       <th><?php echo $rows['p_fname']." ".$rows['p_lname'];?></th>
       <th><?php echo $rows['time'];?></th> 
       <th><?php echo $rows['date'];?></th>
       <?php 
       if($rows['b_status']=="1"){ ?>
       <th><a href="attend.php?bkid=<?php echo $rows['b_id']; ?>">Attend</a></th>
       <?php }
       else{
        ?>
        <th>Attended</th>
<?php
       } ?>
      </tr>
    <?php
}
?>
    </table>
      </div>
    </div>
  </div>
</body>
</html>