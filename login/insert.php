<?php
session_start();
if(isset($_POST['dang-ky'])){

    if($_POST['name'] == null){
        $_SESSION["error"] = "Chưa nhập đủ thông tin";
        header("Location: http://localhost/WEB-ASSIGNMENT_1-main/login/dang-ky.php");
    }
    else $t = $_POST['name'];

    if($_POST['username'] == null){
        $_SESSION["error"] = "Chưa nhập đủ thông tin";
        header("Location: http://localhost/WEB-ASSIGNMENT_1-main/login/dang-ky.php");
    }
    else $tk = $_POST['username'];

    if($_POST['password'] == null){
        $_SESSION["error"] = "Chưa nhập đủ thông tin";
        header("Location: http://localhost/WEB-ASSIGNMENT_1-main/login/dang-ky.php");
    }
    else $mk = $_POST['password'];

    if($_POST['phonenum'] == null){
        $_SESSION["error"] = "Chưa nhập đủ thông tin";
        header("Location: http://localhost/WEB-ASSIGNMENT_1-main/login/dang-ky.php");
    }
    else $pn = $_POST['phonenum'];

    if($_POST['email'] == null){
        $_SESSION["error"] = "Chưa nhập đủ thông tin";
        header("Location: http://localhost/WEB-ASSIGNMENT_1-main/login/dang-ky.php");
    }
    else $e = $_POST['email'];

    if($tk && $mk){
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
        $chkn = 0; 
        $chk = "SELECT * FROM user";
        $resultchk = $conn->query($chk);
        if ($resultchk->num_rows > 0) {
            // output data of each row
                while($row = $resultchk->fetch_assoc()) {
                    if ($row["Username"] == $tk){
                        $chkn++;
                    }
                }
            }

        if ($chkn == 0 ) {
            $ins = "INSERT INTO user (Username, Password, Fullname, PhoneNum, Email) VALUES ('".$tk."', '".$mk."', '".$t."', '".$pn."', '".$e."')";

            if ($conn->query($ins) === TRUE) {
                $_SESSION["error"] = "Đăng ký thành công";
                header("Location: http://localhost/WEB-ASSIGNMENT_1-main/login/index.php");
            } else {
            echo "Error: " . $ins . "<br>" . $conn->error;
            }
        }
        else {
            $_SESSION["error"] = "Trùng tài khoản đăng nhập";
            header("Location: http://localhost/WEB-ASSIGNMENT_1-main/login/dang-ky.php");
        }

        $conn->close();
    }
}
?>