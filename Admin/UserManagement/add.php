<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
session_start();


//validate-------------------------------------
$idErr=$nameErr=$yearErr="";

if (empty($_POST["name"])) {
	$nameErr = "Name is required";
  } else {
	// $name = test_input($_POST["name"]);
	// check if name only contains letters and whitespace
	$name = $_POST["name"];
	if (strlen($name)<5 || strlen($name)>40) {
	  $nameErr = "just from 5 to 40 characters";
	}
  }
  //id
  if (empty($_POST["id"])) {
	$idErr = "Id is required";
  } else {
	$id = $_POST["id"];
	if (!is_numeric($id)) {
	  $idErr = "Must be an integer";
	}
  }
  //year
  if (empty($_POST["year"])) {
	$yearErr = "Year is required";
  } else {
	// $name = test_input($_POST["name"]);
	// check if name only contains letters and whitespace
	$year = $_POST["year"];
	if ($year<1990 || $year>2015) {
	  $yearErr = "Must be between 1990-2015";
	}
  }

//----------------------------------------------------------------------
if($idErr =="" && $nameErr== "" && $yearErr== "") {
  $sql = "INSERT INTO cars (id,name,year) VALUES ('" . $id . "','" . $name . "','" . $year . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from cars WHERE id = '$faq_id' ";
		$cars = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $cars[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'id','<?php echo $cars[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $idErr; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'name','<?php echo $cars[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $nameErr; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'year','<?php echo $cars[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $yearErr; ?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $cars[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>

<tr class= "error" class="table-row" id="table-row-<?php echo $cars[0]["id"]; ?>">
<td><?php echo $idErr; ?></td>
<td><?php echo $nameErr; ?></td>
<td><?php echo $yearErr; ?></td>
<td></td>
</tr> 