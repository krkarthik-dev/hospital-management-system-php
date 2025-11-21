<?php
session_start();
include('../inc/connect.php');
    $bkid=$_REQUEST['bkid'];
    $sql1 = "DELETE FROM `booking_tab` WHERE `b_id` = '$bkid' ";
    $query = mysqli_query($conn, $sql1);
    if($query){
        header("location:appoinment.php");
    }
?>
