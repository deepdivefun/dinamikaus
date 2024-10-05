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
  }

  if (OURCLIENTNAME === "") {
    alert("Please enter Our Client Name");
  }

  if (OURCLIENTPHOTO === "") {
    alert("Please insert Our Client Photo");
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
