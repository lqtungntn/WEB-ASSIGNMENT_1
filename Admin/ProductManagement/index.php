<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../image/logo.png" />
<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
session_start();

$sql = "SELECT * from product";
$product = $db_handle->runSelectQuery($sql);
?>

<ul>
  <li>Admin</li>
  <li><a href="../UserManagement/index.php">User Management</a></li>
  <li><a class="active" href="">Product Management</a></li>
  <li><a href="../Contact/index.php">Contact Info</a></li>
</ul>
<div style="margin-left:10%;height:1000px;">
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header">ID</th>
	  <th class="table-header">Name</th>
	  <th class="table-header">Image</th>
	  <th class="table-header">Price</th>
	  <th class="table-header">Detail</th>
	  <th class="table-header">Operate</th>
	  <th class="table-header">Action</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($product)) { 
	foreach($product as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $product[$k]["ID"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'ID','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["ID"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Fullname','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Fullname"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Image','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Image"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Price','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Price"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Detail','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Detail"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Operate','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Operate"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $product[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
<div class="ajax-action-button" id="add-more" onClick="createNew();">Add More</div>
</div>
<script src="index.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</body>
</html>
