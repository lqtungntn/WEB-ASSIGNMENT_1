<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mercedes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contact";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<ul>
  <li><a href="../UserManagement/index.php">User Management</a></li>
  <li><a href="../ProductManagement/index.php">Product Management</a></li>
  <li><a class="active" href="">Contact Info</a></li>
</ul>
<div style="margin-left:10%;height:1000px;">
<table class="tbl-qa">
      <thead>
  <tr>
    <th>Address</th>
    <th>PhoneNum</th>
    <th>Email</th>
    <th>Facebook</th>
    <th>Twitter</th>
    <th>Reddit</th>
    <th>Youtube</th>
    <th>Instagram</th>
    <th>Telegram</th>
  </tr>
</thead>
<tbody id="table-body">
    <tr class="table-row">
		<td><?php echo $row["Address"]; ?></td>
		<td><?php echo $row["PhoneNum"]; ?></td>
		<td><?php echo $row["Email"]; ?></td>
		<td><?php echo $row["Facebook"]; ?></td>
		<td><?php echo $row["Twitter"]; ?></td>
		<td><?php echo $row["Reddit"]; ?></td>
		<td><?php echo $row["Youtube"]; ?></td>
		<td><?php echo $row["Instagram"]; ?></td>
		<td><?php echo $row["Telegram"]; ?></td>
	</tr>
</tbody>
</table>
<button class="Edit"><a href="./edit.php">Edit</a></button>
</div>

</body>
</html>
