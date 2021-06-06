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

$sql = "SELECT * from cars";
$cars = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();
	var data = '<tr class="table-row" id="new_row_ajax">' +
	'<td contenteditable="true" id="txt_id" onBlur="addToHiddenField(this,\'id\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="txt_name" onBlur="addToHiddenField(this,\'name\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="txt_year" onBlur="addToHiddenField(this,\'year\')" onClick="editRow(this);"></td>' +
	'<td><input type="hidden" id="id" /><input type="hidden" id="name" /><input type="hidden" id="year" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
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
  var year = $("#year").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "add.php",
		type: "POST",
		data:'id='+id+'&name='+name+'&year='+year,
		success: function(data){
		  $("#new_row_ajax").remove();
		  $("#add-more").show();		  
		  $("#table-body").append(data);
		}
	  });
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
}
</script>

<style>
body{width:615px;}
.tbl-qa{width: 98%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
.ajax-action-links {color: #09F; margin: 10px 0px;cursor:pointer;}
.ajax-action-button {border:#094 1px solid;color: #09F; margin: 10px 0px;cursor:pointer;display: inline-block;padding: 10px 20px;}
</style>

<h2>User</h2>

<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header">ID</th>
	  <th class="table-header">Name</th>
	  <th class="table-header">Year</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($cars)) { 
	foreach($cars as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $cars[$k]["id"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'id','<?php echo $cars[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $cars[$k]["id"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'name','<?php echo $cars[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $cars[$k]["name"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'year','<?php echo $cars[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $cars[$k]["year"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $cars[$k]["id"]; ?>);">Delete</a></td>
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