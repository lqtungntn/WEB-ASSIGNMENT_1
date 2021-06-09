<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
session_start();


//validate-------------------------------------
$idErr=$nameErr=$phoneNumErr=$emailErr=$usernameErr=$passwordErr="";
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
  if (empty($email)) {
	$emailErr = "Email is required";
  } else {
	// check if e-mail address is well-formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format";
	}
  }


  $username = $_POST["username"];
  if (strlen($username) < 5){
	$usernameErr ='Username should be at least 5 characters in length';
}


  $password = $_POST["password"];
     // check password
	 $uppercase = preg_match('@[A-Z]@', $password);
	 $lowercase = preg_match('@[a-z]@', $password);
	 $number    = preg_match('@[0-9]@', $password);
	 $specialChars = preg_match('@[^\w]@', $password);
	 if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
		$passwordErr = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
	}





//----------------------------------------------------------------------
if($nameErr== "" && $phoneNumErr== "" && $emailErr=="" && $usernameErr=="" && $passwordErr=="") {
  $sql = "INSERT INTO user (Fullname,PhoneNum,Email,Username,Password) VALUES ('" . $name . "','" . $phoneNum . "','" . $email . "','" . $username . "','" . $password . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from user WHERE ID = '$faq_id' ";
		$user = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $user[0]["ID"]; ?>">
<td><?php echo $faq_id?></td>
<td><?php echo $name?></td>
<td><?php echo $phoneNum?></td>
<td><?php echo $email?></td>
<td><?php echo $username?></td>
<td><?php echo $password?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $user[0]["ID"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>

<<<<<<< Updated upstream
<?php if($nameErr!== "" || $phoneNumErr!== "" || $emailErr!=="" || $usernameErr!=="" && $passwordErr!=="") { ?>
<tr class="error">
<td></td>
=======
<tr class= "error" class="table-row" id="table-row-<?php echo $user[0]["ID"]; ?>">
<td><?php echo "Hello"; ?></td>
>>>>>>> Stashed changes
<td><?php echo $nameErr; ?></td>
<td><?php echo $phoneNumErr; ?></td>
<td><?php echo $emailErr; ?></td>
<td><?php echo $usernameErr; ?></td>
<td><?php echo $passwordErr; ?></td>
<td></td>
</tr> 
<?php }?>