<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
session_start();


//validate-------------------------------------
$idErr=$nameErr=$imageErr=$priceErr=$detailErr=$operateErr="";

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

  $price = $_POST["price"];
  if (empty($_POST["price"])) {
	$priceErr = "Price is required";
  } else {
	if (!is_numeric($price)) {
	  $priceErr = "Price must be a number";
	}
  }

  $detail = $_POST["detail"];
  if (strlen($detail) < 10){
	$detailErr ='Detail descripttion must be at least 10 characters in length';
}

  $operate = $_POST["operate"];
  if (strlen($operate) < 10){
	$operateErr ='Operate descripttion must be at least 10 characters in length';
}




//----------------------------------------------------------------------
if($nameErr== "" && $imageErr== ""&& $priceErr== ""&& $detailErr== ""&& $operateErr== "") {
  $sql = "INSERT INTO product (Fullname,Image,Price,Detail,Operate) VALUES ('" . $name . "','" . $image . "'," . $price . ",'" . $detail . "','" . $operate ."')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from product WHERE ID = '$faq_id' ";
		$product = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $product[0]["ID"]; ?>">
<td><?php echo $faq_id?></td>
<td contenteditable="true" id="name" onBlur="addToHiddenField(this,\'name\')" onClick="editRow(this);"><?php echo $name?></td>
<td contenteditable="true" id="image" onBlur="addToHiddenField(this,\'image\')" onClick="editRow(this);"><?php echo $image?></td>
<td contenteditable="true" id="price" onBlur="addToHiddenField(this,\'price\')" onClick="editRow(this);"><?php echo $price?></td>
<td contenteditable="true" id="detail" onBlur="addToHiddenField(this,\'detail\')" onClick="editRow(this);"><?php echo $detail?></td>
<td contenteditable="true" id="operate" onBlur="addToHiddenField(this,\'operate\')" onClick="editRow(this);"><?php echo $operate?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $product[0]["ID"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>
<?php if($nameErr!== "" || $imageErr!== "" || $priceErr!== "" || $detailErr!== "" || $operateErr!== "") {?>
<tr class= "error" class="table-row">
<td><?php echo "Hello"; ?></td>
<td><?php echo $nameErr; ?></td>
<td><?php echo $imageErr; ?></td>
<td><?php echo $priceErr; ?></td>
<td><?php echo $detailErr; ?></td>
<td><?php echo $operateErr; ?></td>
<td></td>
</tr> 
<?php }?>