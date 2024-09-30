fetch_data();

async function showButtonMetaData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();
  var STATUSID = document.getElementById("FilterStatusID").value;
  var NAME = document.getElementById("FilterName").value;
  var CONTENT = document.getElementById("FilterContent").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "13020.MetaFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      Name: NAME,
      Content: CONTENT,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_NOUSERROLE")) {
          window.location.href = "/";
        } else {
          data = data.replace("SWD_OK", "");
          datatablearr = $.parseJSON(data);
          $("#dataTable").DataTable({
            data: datatablearr,
            lengthMenu: [
              [50, 100, 200, -1],
              [50, 100, 200, "All"],
            ],
            autoWidth: true,
            responsive: true,
          });
        }
      } catch (err) {
        alert(err.message);
      }
    },
    error: function () {
      alert("Error");
    },
  });
}

async function createMeta() {
  var STATUSID = document.getElementById("StatusID").value;
  var NAME = document.getElementById("Name").value;
  var CONTENT = document.getElementById("Content").value;
  var GTOKEN = document.getElementById("GToken").value;
  var CREATEBY = document.getElementById("CreateBy").value;

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  $.ajax({
    type: "POST",
    url: "13010.MetaCreate.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      Name: NAME,
      Content: CONTENT,
      GToken: GTOKEN,
      CreateBy: CREATEBY,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert("Create Success");
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      fetch_data();
      $("#addMeta").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editMeta", function () {
  var METAID = $(this).attr("MetaID");
  var STATUSID = $(this).attr("StatusID");
  var NAME = $(this).attr("Name");
  var CONTENT = $(this).attr("Content");

  $("#EditMetaID").val(METAID);
  $("#EditStatusID").val(STATUSID);
  $("#EditName").val(NAME);
  $("#EditContent").val(CONTENT);

  $("#editMeta").modal("show");
});

async function updateMeta() {
  var METAID = document.getElementById("EditMetaID").value;
  var STATUSID = document.getElementById("EditStatusID").value;
  var NAME = document.getElementById("EditName").value;
  var CONTENT = document.getElementById("EditContent").value;
  var GTOKEN = document.getElementById("GToken").value;
  var UPDATEBY = document.getElementById("UpdateBy").value;

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  $.ajax({
    type: "POST",
    url: "13030.MetaUpdate.php?id=" + Math.random(),
    data: {
      MetaID: METAID,
      StatusID: STATUSID,
      Name: NAME,
      Content: CONTENT,
      GToken: GTOKEN,
      UpdateBy: UPDATEBY,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert("Update Success");
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      fetch_data();
      $("#editMeta").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".deleteMeta", function () {
  var METAID = $(this).attr("MetaID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "13040.MetaDelete.php?id=" + Math.random(),
      data: {
        MetaID: METAID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Delete Success");
          } else {
            alert(data);
          }
        } catch (err) {
          alert(err.message);
        }
        fetch_data();
      },
      error: function () {
        alert("Error");
      },
    });
  }
});

$(document).on("click", ".activeMeta", function () {
  var METAID = $(this).attr("MetaID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "13050.MetaActive.php?id=" + Math.random(),
      data: {
        MetaID: METAID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Activate Success");
          } else {
            alert(data);
          }
        } catch (err) {
          alert(err.message);
        }
        fetch_data();
      },
      error: function () {
        alert("Error");
      },
    });
  }
});

$(document).on("click", ".debugMeta", function () {
  var METAID = $(this).attr("MetaID");
  alert("DEBUG INFO\n\rMetaID : " + METAID);
});
