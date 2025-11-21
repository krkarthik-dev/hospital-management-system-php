<?php
include "../inc/connect.php";
include "../inc/navbar.php";
include "../inc/sidebar.php"; 
$sql = "SELECT * FROM `medicine`";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/HMS/css/tabstyle.css">
    <title>Medicine List</title>
    <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</head>


<body>

<div class = "content">
    <div class="table">
    <h1>Medicine Details</h1><input type="text" id="myInput" name="search" onkeyup="myFunction()" placeholder="Search Here">
    <br><br>
    <table class="tab" id="myTable">
    <tr>
       <th>Sl No:</th>
       <th>Medicine Name</th>
       <th>Price</th> 
       <th>Quantity</th>
    </tr>
<?php
while($rows = mysqli_fetch_assoc($result))
{
?>
    <tr>
       <th><?php echo $rows['id'];?></th>
       <td><b><?php echo $rows['med_name'];?></b></td>
       <th><?php echo $rows['price'];?></th>
       <th><?php echo $rows['qty'];?></th> 
    </tr>
    <?php
}

?>
    </table>
</div>
</div>
</body>
</html>

