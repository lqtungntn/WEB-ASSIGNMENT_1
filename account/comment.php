<?php
session_start();
switch ($_SESSION['pid']) {
    case 1:
      $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricea200.php";
      break;
    case 2:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricea250.php";
       break;
    case 3:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricec200.php";
       break;
    case 4:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricec250.php";
       break;
    case 5:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricec300.php";
       break;
    case 6:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricee200.php";
       break;
    case 7:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricee250.php";
       break;
    case 8:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricee300.php";
       break;
    case 9:
      $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Priceg65.php";
      break;
    case 10:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Priceglc200.php";
       break;
    case 11:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Priceglc300coupe.php";
       break;
    case 12:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Priceglc300matic.php";
       break;
    case 13:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricegle400.php";
       break;
    case 14:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricegle450.php";
       break;
    case 15:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricemb450.php";
       break;
    case 16:
      $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricemb450matic.php";
      break;
    case 17:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricemb560.php";
       break;
    case 18:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Prices450.php";
       break;
    case 19:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Prices500cabriolet.php";
       break;
    case 20:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Prices500coupe.php";
       break;
    case 21:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricev250.php";
       break;
    default:
       $url = "http://localhost/WEB-ASSIGNMENT_1-main/Price/Pricea200.php";
  }
if(isset($_POST['subcomment'])){

    if($_POST['content'] == null){
        $_SESSION["error"] = "Bạn chưa viết comment mà";
        header("Location: ".$url."");
    }
    else {
        $ct = $_POST['content'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = time();
        $pid = $_SESSION['pid'];
        $uid =  $_SESSION["id"];
    }

    if($ct){
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

        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        

        $sql = "INSERT INTO comment (AtTime, Content, ProductId, UserID)
        VALUES ('".$time."', '".$ct."', '".$pid."', '".$uid."')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["error"] = "Đăng ký thành công";
            header("Location: ".$url."");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        $conn->close();
    }
}
?>