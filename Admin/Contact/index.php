<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./index.css">
	<title>Admin</title>
</head>
<body>
<div class="collapse navbar-collapse" id="navbarSupportedContent">	
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../UserManagement/index.php">User Management</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../ProductManagement/index.php">Product Management</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./">Contact Management</a>
              </li>
            </ul>
          </div>
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
<a href="./edit.php">Edit</a>
    <?php
$conn->close();
?>
</body>
</html>