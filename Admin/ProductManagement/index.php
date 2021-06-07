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

$sql = "SELECT * from product";
$product = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();
	var data = '<tr class="table-row" id="new_row_ajax">' +
	'<td contenteditable="true" id="id" onBlur="addToHiddenField(this,\'id\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="name" onBlur="addToHiddenField(this,\'name\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="image" onBlur="addToHiddenField(this,\'image\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="price" onBlur="addToHiddenField(this,\'price\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="detail" onBlur="addToHiddenField(this,\'detail\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="operate" onBlur="addToHiddenField(this,\'operate\')" onClick="editRow(this);"></td>' +
	'<td><input type="hidden" id="id" /><input type="hidden" id="name" /><input type="hidden" id="image" /><input type="hidden" id="price" /><input type="hidden" id="detail" /><input type="hidden" id="operate" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
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
  $.ajax({
    url: "edit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&id='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
	// error: function(req, err){ console.log('my message' + err); }
  });
  alert("Edit successful!!!")
}
function addToDatabase() {
  var id = $("#id").val();
  var name = $("#name").val();
  var image = $("#image").val();
  var price = $("#price").val();
  var detail = $("#detail").val();
  var operate = $("#operate").val();
  
	  $.ajax({
		url: "add.php",
		type: "POST",
		data:'id='+id+'&name='+name+'&image='+image+'&price='+price+'&detail='+detail+'&operate='+operate,
		success: function(data){
		  $("#new_row_ajax").remove();
		  $("#add-more").show();		  
		  $("#table-body").append(data);
		},
		error: function() {
            alert('Error occured');
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
	alert("Delete successful!!!")
}
</script>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">	
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../UserManagement/index.php">User Management</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./">Product Management</a>
              </li>
            </ul>
          </div>
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header">ID</th>
	  <th class="table-header">Name</th>
	  <th class="table-header">Image</th>
	  <th class="table-header">Price</th>
	  <th class="table-header">Detail</th>
	  <th class="table-header">Operate</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($product)) { 
	foreach($product as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $product[$k]["ID"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'ID','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["ID"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Fullname','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Fullname"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Image','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Image"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Price','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Price"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Detail','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Detail"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Operate','<?php echo $product[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $product[$k]["Operate"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $product[$k]["ID"]; ?>);">Delete</a></td>
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