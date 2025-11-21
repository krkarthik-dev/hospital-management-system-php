<?php 
session_start();
$username = $_SESSION['pusr'];
$_SESSION['patient'] = $username;
include "../inc/connect.php";
$sql = "SELECT * FROM `report_tab` AS a,`user_tab` AS b,`patient` AS d WHERE a.username = d.p_username AND a.d_username=b.username AND a.username = '$username'";
$result = mysqli_query($conn,$sql);
?>
 <?php include '../inc/navbar.php'; ?>
   <?php include '../inc/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/HMS/css/adminstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Reports</title>
    <style>
      .profile{
        margin-top: -42%;
      }
    </style>
   </head>
<body>
  <div class="profile">
  <div class="container">
    <div class="title">REPORT</div>
    <br><hr><br>
    <?php while($pf=mysqli_fetch_array($result)){ ?>
      <?php 
      echo "<div class='title'>My Reports On ".$pf["r_date"]."</div>"; ?>
      <hr>
    <div class="content">
      <form action="edit.php" method="POST">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="username" value="<?php echo $pf["p_fname"].' '.$pf["p_lname"]; ?>" required>
          </div>  
        <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" value="<?php echo $pf["p_username"]; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Doctor</span>
            <input type="text" name="username" value="<?php echo $pf["fname"].' '.$pf["lname"]; ?>" required>
          </div>
          <div class="discription">
          <div class="input-box">
            <span class="details">Description</span>
            <textarea style="width :640px; outline: none; font-size: 16px; border-radius: 5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px; transition: all 0.3s ease;" name="username" rows="4" cols="50"><?php echo $pf["remark"]; ?></textarea>
          </div>
          </div>
          <div class="input-box">
            <span class="details">Medicine</span>
            <input type="text" style="width :640px;" name="username" value="<?php echo $pf["med_id"]; ?>" required>
          </div>
      </form>
      
    </div>
    <hr>
<?php } ?>
    

  </div>
</div>
</body>
</html>
<?php
// else
// {
//   echo "No Data Found";
//   echo $username;
// } 


?>