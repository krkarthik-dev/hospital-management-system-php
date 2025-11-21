<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
$usernamec = $_POST['username'];
$passwordc = md5($_POST['password']);
require_once('../inc/connect.php');
$username = mysqli_real_escape_string($conn,$usernamec);
$password = mysqli_real_escape_string($conn,$passwordc);
$sql= "SELECT * FROM `patient` WHERE p_username = '$username' AND p_password = '$password' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
if(isset($check))
{
$qry="INSERT INTO `access_tab` (`username`,`user_type`) VALUES ('$username','Patient')";
mysqli_query($conn,$qry);
$_SESSION['user'] = $username;
$_SESSION['current_user'] = "patient";
header("Location: patient.php");
exit();
}
else
{
 echo "<script> alert('Password or Username doesn't Match!'); </script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/HMS/css/loginstyle.css">
<title> Admin Login</title>
</head>
<body>
<?php include '../inc/navbar.php'?>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Enter your credentials...</p>
          </div>
        </div>
        <form action="patientlogin.php" method="POST" class="login-form">
          <input type="text" name="username" placeholder="username"/>
          <input type="password" name="password"  placeholder="password" id="id_password"/>
          <input type="submit" name="submit" value="Login" class="submit_btn">
          <p class="message">Not registered? <a href="/HMS/patient/register.php">Create an account</a></p>
        </form>
        
      </div>
    </div>
</body>
</html>
