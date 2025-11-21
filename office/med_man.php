<?php
include "../inc/navbar.php";
include "../inc/sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/HMS/css/dm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine details</title>
</head>
<body>
<div class="details">
    <a href="med_list.php">
    <div class="container">
     <ul>
         <li> 
         <br>
         <h3>Medicine<br>List</h3>
         </li>
     </ul>
    </div>
    </a>
    <a href="med_list_so.php">
    <div class="container">
     <ul>
         <li> 
         <br>
         <h3>Out Of Stock</h3>
         </li>
     </ul>
    </div>
    </a>
    <a href="med_list_sl.php">
    <div class="container">
     <ul>
         <li> 
         <br>
         <h3>Stock < 5<br><i>(low Stock)</i></h3>
         </li>
     </ul>
    </div>
    </a>
</div>
</body>
</html>