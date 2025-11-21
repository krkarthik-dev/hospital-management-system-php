<?php
session_start();
include('../inc/connect.php');
$username=$_REQUEST['username'];
    
    
    $qry = "UPDATE `user_tab` SET `status`='0' WHERE `username` = '$username'";
   
    $run = mysqli_query($conn,$qry);
    
   if($run == true){
    header("Location: rmstaff.php");
    }
    ?>