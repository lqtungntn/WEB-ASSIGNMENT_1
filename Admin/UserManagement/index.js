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
