<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../../image/logo.png" />
<style>body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 10%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li:first-child {
  text-align: center;
  font-size: large;
  line-height: 3rem;
  font-weight: bold;
}

li a {
  display: block;
  color: #000;
  padding: 5% 5%;
  text-decoration: none;
  text-align: center;
}

li a.active {
  background-color: #04aa6d;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
.align-items-start {
  width: 20%;
}
.tbl-qa {
  width: 98%;
  font-size: 0.9em;
  background-color: #f5f5f5;
}
.tbl-qa th.table-header {
  padding: 5px;
  text-align: left;
  padding: 10px;
}
.tbl-qa .table-row td {
  padding: 10px;
  background-color: #fdfdfd;
}
.ajax-action-links {
  color: #09f;
  margin: 10px 0px;
  cursor: pointer;
}
.ajax-action-button {
  border: #094 1px solid;
  color: #09f;
  margin: 10px 0px;
  cursor: pointer;
  display: inline-block;
  padding: 10px 20px;
}

a.button:link,
a.button:visited {
  margin-left: 1%;
  margin-top: 1%;
  color: gray;
  background-color: #d8e2dc;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a.button:hover,
a.button:active {
  background-color: #04aa6d;
  color: white;
}</style>
</head>
<body>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
session_start();

$sql = "SELECT * from user";
$user = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
  $("#add-more").hide();
  var data =
    '<tr class="table-row" id="new_row_ajax">' +
    '<td contenteditable="true" id="txt_id" onBlur="addToHiddenField(this,\'id\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="txt_name" onBlur="addToHiddenField(this,\'name\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="phoneNum" onBlur="addToHiddenField(this,\'phoneNum\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="email" onBlur="addToHiddenField(this,\'email\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="username" onBlur="addToHiddenField(this,\'username\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="password" onBlur="addToHiddenField(this,\'password\')" onClick="editRow(this);"></td>' +
    '<td><input type="hidden" id="id" /><input type="hidden" id="name" /><input type="hidden" id="phoneNum" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +
    "</tr>";
  $("#table-body").append(data);
}
function cancelAdd() {
  $("#add-more").show();
  $("#new_row_ajax").remove();
}
function editRow(editableObj) {
  $(editableObj).css("background", "#FFF");
}

function saveToDatabase(editableObj, column, id) {
  $(editableObj).css("background", "#FFF url(loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "edit.php",
    type: "POST",
    data:
      "column=" + column + "&editval=" + $(editableObj).text() + "&id=" + id,
    success: function (data) {
      $(editableObj).css("background", "#FDFDFD");
    },
  });
}
function addToDatabase() {
  var id = $("#id").val();
  var name = $("#name").val();
  var phoneNum = $("#phoneNum").val();
  var email = $("#email").val();
  var username = $("#username").val();
  var password = $("#password").val();

  $.ajax({
    url: "add.php",
    type: "POST",
    data:
      "id=" +
      id +
      "&name=" +
      name +
      "&phoneNum=" +
      phoneNum +
      "&email=" +
      email +
      "&username=" +
      username +
      "&password=" +
      password,
    success: function (data) {
      $("#new_row_ajax").remove();
      $("#add-more").show();
      $("#table-body").append(data);
    },
  });
}
function addToHiddenField(addColumn, hiddenField) {
  var columnValue = $(addColumn).text();
  $("#" + hiddenField).val(columnValue);
}

function deleteRecord(id) {
  if (confirm("Are you sure you want to delete this row?")) {
    $.ajax({
      url: "delete.php",
      type: "POST",
      data: "id=" + id,
      success: function (data) {
        $("#table-row-" + id).remove();
      },
    });
  }
  alert("Delete successful!!!");
}
</script>
<ul>
  <li>Admin</li>
  <li><a class="active" href="">User Management</a></li>
  <li><a href="../ProductManagement/index.php">Product Management</a></li>
  <li><a href="../Contact/index.php">Contact Info</a></li>
</ul>
<div style="margin-left:10%;height:1000px;">
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header">ID</th>
	  <th class="table-header">Fullname</th>
	  <th class="table-header">PhoneNum</th>
	  <th class="table-header">Email</th>
	  <th class="table-header">Username</th>
	  <th class="table-header">Password</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($user)) { 
	foreach($user as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $user[$k]["ID"]; ?>">
		<td><?php echo $user[$k]["ID"]; ?></td>
		<td><?php echo $user[$k]["Fullname"]; ?></td>
		<td><?php echo $user[$k]["PhoneNum"]; ?></td>
		<td><?php echo $user[$k]["Email"]; ?></td>
		<td><?php echo $user[$k]["Username"]; ?></td>
		<td><?php echo $user[$k]["Password"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $user[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
<div class="ajax-action-button" id="add-more" onClick="createNew();">Add More</div>
</div>
<script src="./index.js"></script>
</body>
</html>
