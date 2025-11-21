<?php 
session_start();
$username = $_SESSION['user'];
$_SESSION['patient'] = $username;
include "../inc/connect.php";
$sql = "SELECT * FROM `patient` WHERE p_username = '$username' ";
$result = mysqli_query($conn,$sql);
$pf = mysqli_fetch_array($result);
?>
 <?php include '../inc/navbar.php'; ?>
   <?php include '../inc/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/HMS/css/adminstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .profile{
        margin-top: -42%;
      }
    </style>
   </head>
<body>
  <div class="profile">
  <div class="container">
  <img src="/HMS/img/<?php echo $pf['p_image']; ?>" alt="Profile Picture" align="right" width="160vh" height="160vh">
    <div class="title">PATIENT</div>
    <br><hr><br>
    <div class="title">My Profile</div>
    <br><br><br>
    <div class="content">
      <form action="edit.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" value="<?php echo $pf["p_fname"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" value="<?php echo $pf["p_lname"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" value="<?php echo $pf["p_username"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" value="<?php echo $pf["p_email"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" value="<?php echo $pf["p_address"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name="city" value="<?php echo $pf["p_city"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" name="state" value="<?php echo $pf["p_state"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Pin code</span>
            <input type="text" name="pin" value="<?php echo $pf["p_pincode"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Blood Group</span>
            <input type="text" name="bgroup" value="<?php echo $pf["p_bloodgroup"]; ?>" required>
          </div>
          <div class="input-box">

            <span class="details">Phone Number</span>
            <input type="text" name="phno" value="<?php echo $pf["p_phno"]; ?>"  required>
          </div>
        <div class="input-box">
          <span class="details">Gender</span>
          <input type="text" name="gender" value="<?php echo $pf["p_gender"]; ?>" required>
        </div>
      </form>
      <a href="edit.php"><input type="button" value="EDIT"></a>
    </div>
  </div>
</div>
</body>
</html>
