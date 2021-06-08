<?php
session_start();
if(isset($_POST['update'])){

    $t = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $tk = $_POST['username'];
    $mk = $_POST['password'];
    $e = $_POST['email'];
    $id = $_SESSION['id'];


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

        $sql = "UPDATE user SET Username='".$tk."', Password='".$mk."', Fullname='".$t."', PhoneNum='".$sdt."', Email='".$e."' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                $_SESSION["error"] = "Cập nhật thành công thành công";
                $_SESSION["tk"] = $tk;
                $_SESSION["mk"] = $mk;
                $_SESSION["name"] = $t;
                $_SESSION["sdt"] = $sdt;
                $_SESSION["email"] = $e;
                header("Location: http://localhost/WEB-ASSIGNMENT_1/account/index.php");
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>