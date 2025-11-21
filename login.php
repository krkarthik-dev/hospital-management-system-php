<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usernamec = $_POST['username'];
  $passwordc = md5($_POST['password']);
  require_once('inc/connect.php');
  $username = mysqli_real_escape_string($conn, $usernamec);
  $password = mysqli_real_escape_string($conn, $passwordc);
  $sql = "SELECT * FROM `user_tab` WHERE username = '$username' AND password = '$password' AND status=1 ";
  $result = mysqli_query($conn, $sql);
  $check = mysqli_fetch_array($result);
  if (isset($check)) {
    $user_type = $check['user_type'];
    $qry = "INSERT INTO `access_tab` (`username`,`user_type`) VALUES ('$username','$user_type')";
    mysqli_query($conn, $qry);
    if($user_type==='admin')
    {
    $_SESSION['user'] = $username;
    $_SESSION['current_user'] = "$user_type";
    header("Location: /HMS/admin/admin.php");
    exit();
    }
    else if($user_type==='staff')
    {
    $_SESSION['user'] = $username;
    $_SESSION['current_user'] = "$user_type";
    header("Location: /HMS/office/office.php");
    exit();
    }
    else if($user_type==='doctor')
    {
    $_SESSION['user'] = $username;
    $_SESSION['current_user'] = "$user_type";
    header("Location: doctor/doctor.php");
    exit();
    }

  } else {
    echo "<script> alert('Password or Username doesn't Match!'); </script>";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="/HMS/css/loginstyle.css">
  <title> Login</title>
</head>

<body>
  <?php include 'inc/navbar.php' ?>
  <div class="login-page">
    <div class="form">
      <div class="login">
        <div class="login-header">
          <h3>LOGIN</h3>
          <p>Enter your credentials...</p>
        </div>
      </div>
      <form action="login.php" method="POST" class="login-form">
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" id="id_password" />
        <input type="submit" name="submit" value="Login" class="submit_btn">
      </form>

    </div>
  </div>
</body>
</html>
