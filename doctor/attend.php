<?php include '../inc/navbar.php';
include '../inc/sidebar.php';
include "../inc/connect.php";
?>

<?php
if (isset($_POST['submit'])) {
    $pusername = $_POST['pusrname'];
    $dusername = $_POST['dusrname'];
    $bkid = $_POST['bkid'];
    $remark = $_POST['description'];
    $med = "";
    $medicines = $_POST['medicines'];
    foreach ($medicines as $item) {
        $med .= $item . " , ";
    }
    $qry = "INSERT INTO `report_tab`(`username`,`remark`,`med_id`,`d_username`) VALUES ('$pusername','$remark','$med','$dusername')";
    $result1 = mysqli_query($conn, $qry);
    if ($result1) {
        $qry2 = "UPDATE `booking_tab` SET b_status='0' where b_id='$bkid'";
        $result2 = mysqli_query($conn, $qry2);
        if ($result2) {
            header("Location: appoinment_log.php");
        }
    }
}
?>
<?php
$bkid = $_REQUEST['bkid'];
$sql1 = "SELECT * FROM `booking_tab` WHERE b_id = '$bkid' ";
$rslt = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($rslt);
$pusername = $row['username'];
$dusername = $row['dname'];
$sql = "SELECT * FROM `patient` WHERE p_username='$pusername'";
$result = mysqli_query($conn, $sql);
$pf = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/HMS/css/adminstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="multiselect-dropdown.js"></script>
    <title>Attend</title>
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

            <br>
            <div class="title">PATIENT Report</div>
            <?php 
            $_SESSION['pusr']=$pusername;
            ?>
            <hr><br>
            <a href="/HMS/doctor/prev_reports.php">Previous Reports</a>
            <br><br><br>
            <div class="content">
                <form action="attend.php" method="POST" name="form">
                    <div class="user-details">
                        <input type="hidden" name="pusrname" value="<?php echo $pusername ?>">
                        <input type="hidden" name="dusrname" value="<?php echo $dusername ?>">
                        <input type="hidden" name="bkid" value="<?php echo $bkid ?>">
                        <div class="input-box">
                            <span class="details">First Name</span>
                            <input type="text" name="fname" value="<?php echo $pf["p_fname"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">Last Name</span>
                            <input type="text" name="lname" value="<?php echo $pf["p_lname"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">Address</span>
                            <input type="text" name="address" value="<?php echo $pf["p_address"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">State</span>
                            <input type="text" name="state" value="<?php echo $pf["p_state"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">Blood Group</span>
                            <input type="text" name="bgroup" value="<?php echo $pf["p_bloodgroup"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" name="phno" value="<?php echo $pf["p_phno"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">Gender</span>
                            <input type="text" name="gender" value="<?php echo $pf["p_gender"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">DOB</span>
                            <input type="text" name="gender" value="<?php echo $pf["p_DOB"]; ?>" disabled>
                        </div>
                        <div class="input-box">
                            <span class="details">Medical History</span>
                            <textarea style="width: 210%;" name="medical_history" rows="4" cols="50" value="<?php echo $pf["Med_history"]; ?>" disabled></textarea>
                        </div>
                        <div class="input-box">
                        </div>
                        <div class="input-box">
                            <span class="details">Add Medicines</span>
                        </div>
                        <select style="width: 50%;" type="select" name="medicines[]" id="medicines" multiple multiselect-search="true">
                            <?php
                            $q1 = "SELECT * FROM `medicine`";
                            $result = mysqli_query($conn, $q1);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row['med_name']; ?>"><?php echo $row['med_name']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-box">
                            <span class="details">Add Description</span>
                            <textarea style="width: 210%;" name="description" rows="4" cols="50" value="<?php echo $pf4["remark"]; ?>"></textarea>
                        </div>
                        <div class="input-box">
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" id="submit" value="Submit">
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>