
<?php
include "../inc/navbar.php";
include "../inc/sidebar.php";
include "../inc/connect.php";
$sql = "SELECT * FROM `access_tab` ORDER BY `time` desc";
$result = mysqli_query($conn,$sql);
$count=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/HMS/css/tabstyle.css">
    <title>Access Log</title>
</head>
<body>
<div class = "content">
    <div class="table">
    <h1>Access Log</h1>
    <table class="tab" id="myTable">
    <tr>
       <th>Sl No:</th>
       <th>Username</th>
       <th>User type</th>
       <th>Date and Time</th>
    </tr>
<?php
while($rows = mysqli_fetch_assoc($result))
{
?>
    <tr>
       <td><?php echo $count; ?></td>
       <td><?php echo $rows['username'];?></td>
       <td><?php echo $rows['user_type'];?></td>
       <td><?php echo $rows['time'];?></td>
    </tr>
    <?php
    $count++;
}

?>
    </table>
</div>
</div>
<a href="/HMS/admin/report.php"><input type="button" class="print" value="Print"></a>
</body>
</html>

