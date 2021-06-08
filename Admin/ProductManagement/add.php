<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
session_start();


//validate-------------------------------------
$idErr=$nameErr=$imageErr=$priceErr=$detailErr=$operateErr="";

 //id
 if (empty($_POST["id"])) {
	$idErr = "Id is required";
  } else {
	$id = $_POST["id"];
	if (!is_numeric($id)) {
	  $idErr = "Must be an integer";
	}
  }
  //name
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
//   //year
//   if (empty($_POST["year"])) {
// 	$yearErr = "Year is required";
//   } else {
// 	// $name = test_input($_POST["name"]);
// 	// check if name only contains letters and whitespace
// 	$year = $_POST["year"];
// 	if ($year<1990 || $year>2015) {
// 	  $yearErr = "Must be between 1990-2015";
// 	}
//   }

  //phoneNum
  if (empty($_POST["image"])) {
	$imageErr = "image is required";
  } else {
	// $name = test_input($_POST["name"]);
	// check if name only contains letters and whitespace
	$image = $_POST["image"];
	if (0) {
	//   $phoneNumErr = "Must be a number";
	}
  }

  //has not validate yet
  $price = $_POST["price"];
  $detail = $_POST["detail"];
  $operate = $_POST["operate"];





//----------------------------------------------------------------------
if($idErr =="" && $nameErr== "" && $imageErr== ""&& $priceErr== ""&& $detailErr== ""&& $operateErr== "") {
  $sql = "INSERT INTO product (ID,Fullname,Image,Price,Detail,Operate) VALUES ('" . $id . "','" . $name . "','" . $image . "','" . $price . "','" . $detail . "','" . $operate ."')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from product WHERE id = '$faq_id' ";
		$product = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row">
<td contenteditable="true" id="id" onBlur="addToHiddenField(this,\'id\')" onClick="editRow(this);"><?php echo $id?></td>
<td contenteditable="true" id="name" onBlur="addToHiddenField(this,\"name\')" onClick="editRow(this);"><?php echo $name?></td>
<td contenteditable="true" id="image" onBlur="addToHiddenField(this,\'image\')" onClick="editRow(this);"><?php echo $image?></td>
<td contenteditable="true" id="price" onBlur="addToHiddenField(this,\'price\')" onClick="editRow(this);"><?php echo $price?></td>
<td contenteditable="true" id="detail" onBlur="addToHiddenField(this,\'detail\')" onClick="editRow(this);"><?php echo $detail?></td>
<td contenteditable="true" id="operate" onBlur="addToHiddenField(this,\'operate\')" onClick="editRow(this);"><?php echo $operate?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $product[0]["ID"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>
<tr class= "error" class="table-row" id="table-row">
<td><?php echo $idErr; ?></td>
<td><?php echo $nameErr; ?></td>
<td><?php echo $imageErr; ?></td>
<td><?php echo $priceErr; ?></td>
<td><?php echo $detailErr; ?></td>
<td><?php echo $operateErr; ?></td>
<td></td>
</tr> 
