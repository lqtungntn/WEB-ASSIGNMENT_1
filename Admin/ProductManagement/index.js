function createNew() {
  $("#add-more").hide();
  var data =
    '<tr class="table-row" id="new_row_ajax">' +
    '<td contenteditable="true" id="id" onBlur="addToHiddenField(this,\'id\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="name" onBlur="addToHiddenField(this,\'name\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="image" onBlur="addToHiddenField(this,\'image\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="price" onBlur="addToHiddenField(this,\'price\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="detail" onBlur="addToHiddenField(this,\'detail\')" onClick="editRow(this);"></td>' +
    '<td contenteditable="true" id="operate" onBlur="addToHiddenField(this,\'operate\')" onClick="editRow(this);"></td>' +
    '<td><input type="hidden" id="id" /><input type="hidden" id="name" /><input type="hidden" id="image" /><input type="hidden" id="price" /><input type="hidden" id="detail" /><input type="hidden" id="operate" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +
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
  $.ajax({
    url: "edit.php",
    type: "POST",
    data:
      "column=" + column + "&editval=" + $(editableObj).text() + "&id=" + id,
    success: function (data) {
      $(editableObj).css("background", "#FDFDFD");
      alert("Edit successful!!!");
    },
    // error: function(req, err){ console.log('my message' + err); }
  });
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
    data:
      "id=" +
      id +
      "&name=" +
      name +
      "&image=" +
      image +
      "&price=" +
      price +
      "&detail=" +
      detail +
      "&operate=" +
      operate,
    success: function (data) {
      $("#new_row_ajax").remove();
      $("#add-more").show();
      $("#table-body").append(data);
    },
    error: function () {
      alert("Error occured");
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
