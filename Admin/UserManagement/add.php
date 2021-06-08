<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
session_start();


//validate-------------------------------------
$idErr=$nameErr=$phoneNumErr=$emailErr=$usernameErr=$passwordErr="";

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
  if (empty($_POST["phoneNum"])) {
	$phoneNumErr = "phoneNum is required";
  } else {
	// $name = test_input($_POST["name"]);
	// check if name only contains letters and whitespace
	$phoneNum = $_POST["phoneNum"];
	if (!is_numeric($phoneNum)) {
	  $phoneNumErr = "Just only include number";
	}
  }

  //has not validate yet
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];





//----------------------------------------------------------------------
if($idErr =="" && $nameErr== "" && $phoneNumErr== "") {
  $sql = "INSERT INTO user (ID,Fullname,PhoneNum,Email,Username,Password) VALUES ('" . $id . "','" . $name . "','" . $phoneNum . "','" . $email . "','" . $username . "','" . $password . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from user WHERE ID = '$faq_id' ";
		$user = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $user[0]["ID"]; ?>">
<td><?php echo $id?></td>
<td><?php echo $name?></td>
<td><?php echo $phoneNum?></td>
<td><?php echo $email?></td>
<td><?php echo $username?></td>
<td><?php echo $password?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $user[0]["ID"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>

<tr class= "error" id="table-row-<?php echo $user[0]["ID"]; ?>">
<td><?php echo "Hello" ?></td>
<td><?php echo $nameErr; ?></td>
<td><?php echo $phoneNumErr; ?></td>
<td><?php echo $emailErr; ?></td>
<td><?php echo $usernameErr; ?></td>
<td><?php echo $passwordErr; ?></td>
<td><?php echo $idErr.$nameErr.$phoneNumErr.$emailErr.$usernameErr.$passwordErr;?></td>
</tr> 
