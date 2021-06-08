<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="./index.css">
	<title>Admin</title>
</head>
<body>
  <div class="content">
  <div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">                <a class="nav-link active" aria-current="page" href="../">Trang chủ</a>
</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">                <a class="nav-link" aria-current="page" href="../UserManagement/index.php">User Management</a>
</button>
    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">                <a class="nav-link" aria-current="page" href="../ProductManagement/index.php">Product Management</a>
</button>
    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">                <a class="nav-link" aria-current="page" href="./">Contact Management</a>
</button>
  </div>
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
</div>
<a href="./edit.php">Edit</a>
    <?php
$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>