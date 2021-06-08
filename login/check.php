<?php
session_start();
if(isset($_POST['login'])){

    if($_POST['username'] == null){
        $_SESSION["error"] = "Chưa nhập đủ thông tin";
        header("Location: http://localhost/WEB-ASSIGNMENT_1/login/index.php");
    }
    else $tk = $_POST['username'];

    if($_POST['password'] == null){
        $_SESSION["error"] = "Chưa nhập đủ thông tin";
        header("Location: http://localhost/WEB-ASSIGNMENT_1/login/index.php");
    }
    else $mk = $_POST['password'];

    if($tk && $mk){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mercedes";
        $check = $_SESSION["is_login"] = false;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn,"utf8");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($row["Username"] == $tk && $row["Password"] == $mk){
                    $check = true;
                    $_SESSION["is_login"] = true;
                    $_SESSION["id"] = $row["ID"];
                    $_SESSION["tk"] = $row["Username"];
                    $_SESSION["mk"] = $row["Password"];
                    $_SESSION["name"] = $row["Fullname"];
                    $_SESSION["sdt"] = $row["PhoneNum"];
                    $_SESSION["email"] = $row["Email"];
                    $_SESSION["error"] = "Đăng nhập thành công";
                    header("Location: http://localhost/WEB-ASSIGNMENT_1/account/index.php");
                    break;
                }
                else {
                    $_SESSION["is_login"] = false;
                    $_SESSION["error"] = "Nhập sai thông tin";
                    header("Location: http://localhost/WEB-ASSIGNMENT_1/login/index.php");
                }
            }
        } else {
            $_SESSION["error"] = "Chưa có tài khoản nào";
            header("Location: http://localhost/WEB-ASSIGNMENT_1/login/index.php");
        }
        $conn->close();
    }
}
?>