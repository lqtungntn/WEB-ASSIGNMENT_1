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
if($_POST["column"] =="image") {
    if (empty($_POST["editval"])) {
        $err = "Image is required";
      } else {
        // $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        $image = $_POST["editval"];
        if (0) {
          $err = "Must be between 1990-2015";
        }
      }
}
if($_POST["column"] =="price") {
  if (empty($_POST["editval"])) {
      $err = "Price is required";
    } else {
      $price = $_POST["Price"];
      if (!is_numeric($price)) {
        $err = "Must be a number";
      }
    }
}

if($_POST["column"] =="detail") {
  if (empty($_POST["editval"])) {
      $err = "Detail is required";
    } else {
      $detail = $_POST["editval"];
      if (strlen($detail)<20) {
        $err = "Detail must be more than 20 characters";
      }
    }
}

if($_POST["column"] =="operate") {
  if (empty($_POST["editval"])) {
      $err = "Operate description is required";
    } else {
      $operate = $_POST["editval"];
      if (strlen($operate)<20) {
        $err = "Operate description must be more than 20 characters";
      }
    }
}

if($err==""){
$sql = "UPDATE product set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"];
$result = $db_handle->executeUpdate($sql);}
?>
