fetch_data();

async function showButtonOurClientData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var OURCLIENTNAME = document.getElementById("FilterOurClientName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "7020.OurClientFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      OurClientName: OURCLIENTNAME,
      GTOKEN: GTOKEN,
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

// Before Create
OurClientPhoto.onchange = (evt) => {
  const [file] = OurClientPhoto.files;
  if (file) {
    PreviewOurClientPhoto.src = URL.createObjectURL(file);
  }
};

async function createOurClient() {
  var FD = new FormData();

  var STATUSID = $("#StatusID").val();
  var OURCLIENTNAME = $("#OurClientName").val();
  var OURCLIENTPHOTO = $("#OurClientPhoto")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("StatusID", STATUSID);
  FD.append("OurClientName", OURCLIENTNAME);
  FD.append("OurClientPhoto", OURCLIENTPHOTO);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (OURCLIENTNAME === "") {
    alert("Please enter Our Client Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "7010.OurClientCreate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert("Create Success");
          fetch_data();
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      fetch_data();
      $("#addOurClient").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editOurClient", function () {
  var OURCLIENTID = $(this).attr("OurClientID");
  var STATUSID = $(this).attr("StatusID");
  var OURCLIENTNAME = $(this).attr("OurClientName");
  var OURCLIENTPHOTO = $(this).attr("OurClientPhoto");

  $("#EditOurClientID").val(OURCLIENTID);
  $("#EditStatusID").val(STATUSID);
  $("#EditOurClientName").val(OURCLIENTNAME);
  $("#EditOurClientPhotoBeforeConvert").val(OURCLIENTPHOTO);

  $("#editOurClient").modal("show");
});

// Before Edit
EditOurClientPhoto.onchange = (evt) => {
  const [file] = EditOurClientPhoto.files;
  if (file) {
    PreviewEditOurClientPhoto.src = URL.createObjectURL(file);
  }
};

async function updateOurClient() {
  var FD = new FormData();

  var OURCLIENTID = $("#EditOurClientID").val();
  var STATUSID = $("#EditStatusID").val();
  var OURCLIENTNAME = $("#EditOurClientName").val();
  var OURCLIENTPHOTO = $("#EditOurClientPhoto")[0].files[0];
  var OURCLIENTPHOTOBEFORECONVERT = $("#EditOurClientPhotoBeforeConvert").val();
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("OurClientID", OURCLIENTID);
  FD.append("StatusID", STATUSID);
  FD.append("OurClientName", OURCLIENTNAME);
  FD.append("OurClientPhoto", OURCLIENTPHOTO);
  FD.append("OurClientPhotoBeforeConvert", OURCLIENTPHOTOBEFORECONVERT);
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  if (OURCLIENTID == "") {
    alert("OurClientID Undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (OURCLIENTNAME === "") {
    alert("Please enter Our Client Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "7030.OurClientUpdate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert("Update Success");
          fetch_data();
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      fetch_data();
      $("#editOurClient").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".deleteOurClient", function () {
  var OURCLIENTID = $(this).attr("OurClientID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "7040.OurClientDelete.php?id=" + Math.random(),
      data: {
        OurClientID: OURCLIENTID,
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

$(document).on("click", ".activeOurClient", function () {
  var OURCLIENTID = $(this).attr("OurClientID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "7050.OurClientActive.php?id=" + Math.random(),
      data: {
        OurClientID: OURCLIENTID,
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

$(document).on("click", ".debugOurClient", function () {
  var OURCLIENTID = $(this).attr("OurClientID");
  alert("DEBUG INFO\n\rOurClientID : " + OURCLIENTID);
});
