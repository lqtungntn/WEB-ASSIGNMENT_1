<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="index.css">
	<title>Admin</title>
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
	var data = '<tr class="table-row" id="new_row_ajax">' +
	'<td contenteditable="true" id="txt_id" onBlur="addToHiddenField(this,\'id\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="txt_name" onBlur="addToHiddenField(this,\'name\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="phoneNum" onBlur="addToHiddenField(this,\'phoneNum\')" onClick="editRow(this);"></td>' +
	'<td><input type="hidden" id="id" /><input type="hidden" id="name" /><input type="hidden" id="phoneNum" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
	'</tr>';
  $("#table-body").append(data);
}
function cancelAdd() {
	$("#add-more").show();
	$("#new_row_ajax").remove();
}
function editRow(editableObj) {
  $(editableObj).css("background","#FFF");
}

function saveToDatabase(editableObj,column,id) {
  $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "edit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&id='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
  var id = $("#id").val();
  var name = $("#name").val();
  var phoneNum = $("#phoneNum").val();
  
	  $.ajax({
		url: "add.php",
		type: "POST",
		data:'id='+id+'&name='+name+'&phoneNum='+phoneNum,
		success: function(data){
		  $("#new_row_ajax").remove();
		  $("#add-more").show();		  
		  $("#table-body").append(data);
		},
		error: function() {
            alert('Error occured');
        }
	  });

	  <?php 
	//   $err=$_SESSION["err"];
	  ?>
	//   var notifyErr='<p>Hello</p>';
	//   $("#notifyErr").append(notifyErr);
}
function addToHiddenField(addColumn,hiddenField) {
	var columnValue = $(addColumn).text();
	$("#"+hiddenField).val(columnValue);
}

function deleteRecord(id) {
	if(confirm("Are you sure you want to delete this row?")) {
		$.ajax({
			url: "delete.php",
			type: "POST",
			data:'id='+id,
			success: function(data){
			  $("#table-row-"+id).remove();
			}
		});
	}
	alert("Delete successful!!!")
}
</script>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">	
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./">User Management</a>
              </li>
            </ul>
          </div>
<p id="notifyErr"></p>
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
</body>
</html>