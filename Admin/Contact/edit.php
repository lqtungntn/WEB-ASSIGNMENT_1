<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mercedes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$addressErr=$phoneNumErr=$emailErr=$linkErr="";

//query get id
$queries = array();

$sql = "SELECT * FROM contact" ;
$result = $conn->query($sql);
$recordUpdate = $result->fetch_assoc();

// session_start();

// $_SESSION['idUpdate'] = $idUpdate;
// $_SESSION['name'] = $recordUpdate['name'];
// $_SESSION['year'] = $recordUpdate['year'];
// else {
//     // session_start();
//     // $idUpdate=$_SESSION['idUpdate'];
//     // $recordUpdate['name']=$_SESSION['name'];
//     // $recordUpdate['year']=$_SESSION['year'];
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $addressErr=$phoneNumErr=$emailErr=$linkErr="";
    echo $_POST["address"];
    //validate id name year
    //name
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
      } else {
        // $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        $address = $_POST["address"];
        if (strlen($address)<5) {
          $addressErr = "Address must more than 5 characters";
        }
      }

      //phoneNum
      if (empty($_POST["phoneNum"])) {
        $phoneNumErr = "Phone is required";
    } else {
        // check if phone only number
        $phoneNum = $_POST["phoneNum"];
        if (!preg_match("/^[0-9]*$/", $phoneNum)) {
          $phoneNumErr = "Only number allowed";
        }
    }

      //email
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = ($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      $facebook = ($_POST["facebook"]);
      $twitter = ($_POST["twitter"]);
      $reddit = ($_POST["reddit"]);
      $youtube = ($_POST["youtube"]);
      $instagram = ($_POST["instagram"]);
      $telegram = ($_POST["telegram"]);



    if($addressErr== "" && $phoneNumErr== "" && $emailErr== "" && $linkErr== "")
    {$sql = "UPDATE contact SET Address= '". $address ."', PhoneNum=" . $phoneNum . ", Email= '" . $email . "', Facebook='" .$facebook . "', Twitter='" . $twitter . "', Reddit='" .$reddit . "', Youtube= '" .$youtube . "', Instagram='" .$instagram . "', Telegram= '" .$telegram. "';";

        if(mysqli_query($conn, $sql)){
            echo "<script>alert(\"Update successfully\");</script>";
            echo "<script>window.location.href = './index.php';</script>";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}

$conn->close();
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <p>Address</p>
            <input id="address" type="text" name="address" value="<?php echo $recordUpdate['Address'] ?>">
            <span class="error">* <?php echo $addressErr;?></span>
    <p>Phone Number</p>
            <input id="phoneNum" type="number" name="phoneNum" value="<?php echo $recordUpdate['PhoneNum'] ?>">
            <span class="error">* <?php echo $phoneNumErr;?></span>
    <p>Email</p>
            <input id="email" type="text" name="email" value="<?php echo $recordUpdate['Email'] ?>">
            <span class="error">* <?php echo $emailErr;?></span>
    <p>Facebook</p>
            <input id="facebook" type="text" name="facebook" value="<?php echo $recordUpdate['Facebook'] ?>">
            <span class="error">* <?php echo $linkErr;?></span>
    <p>Twitter</p>
            <input id="Twitter" type="text" name="twitter" value="<?php echo $recordUpdate['Twitter'] ?>">
            <span class="error">* <?php echo $linkErr;?></span>
    <p>Reddit</p>
            <input id="reddit" type="text" name="reddit" value="<?php echo $recordUpdate['Reddit'] ?>">
            <span class="error">* <?php echo $linkErr;?></span>
    <p>Youtbue</p>
            <input id="youtube" type="text" name="youtube" value="<?php echo $recordUpdate['Youtube'] ?>">
            <span class="error">* <?php echo $linkErr;?></span>
    <p>Instagram</p>
            <input id="instagram" type="text" name="instagram" value="<?php echo $recordUpdate['Instagram'] ?>">
            <span class="error">* <?php echo $linkErr;?></span>
    <p>Telegram</p>
            <input id="telegram" type="text" name="telegram" value="<?php echo $recordUpdate['Telegram'] ?>">
            <span class="error">* <?php echo $linkErr;?></span>

    <br><br>
    <input type="submit" value="Accept change"/>
    </form>
    <a href="./index.php">Home</a>
</body>
</html>