<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

//validate
$err="";
if($_POST["column"] =="id") {
    if (empty($_POST["editval"])) {
        $err = "Id is required";
      } else {
        $id = $_POST["id"];
        if (!is_numeric($id)) {
          $err = "Must be an integer";
        }
      }
}
if($_POST["column"] =="name") {
    if (empty($_POST["editval"])) {
        $err = "Name is required";
      } else {
        $name = $_POST["editval"];
        if (strlen($name)<5 || strlen($name)>40) {
          $err = "just from 5 to 40 characters";
        }
      }
}
if($_POST["column"] =="year") {
    if (empty($_POST["editval"])) {
        $err = "Year is required";
      } else {
        // $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        $year = $_POST["editval"];
        if ($year<1990 || $year>2015) {
          $err = "Must be between 1990-2015";
        }
      }
}

if($err==""){
$sql = "UPDATE cars set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"];
$result = $db_handle->executeUpdate($sql);}
?>
