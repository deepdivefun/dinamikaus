fetch_data();

async function showButtonShippingLogoData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var SHIPPINGNAME = document.getElementById("FilterShippingName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "11020.ShippingLogoFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ShippingName: SHIPPINGNAME,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_NOUSERROLE")) {
          window.location.href = "/";
          return;
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
ShippingPhoto.onchange = (evt) => {
  const [file] = ShippingPhoto.files;
  if (file) {
    PreviewShippingPhoto.src = URL.createObjectURL(file);
  }
};

async function createShippingLogo() {
  var FD = new FormData();

  var STATUSID = $("#StatusID").val();
  var SHIPPINGNAME = $("#ShippingName").val();
  var SHIPPINGPHOTO = $("#ShippingPhoto")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("StatusID", STATUSID);
  FD.append("ShippingName", SHIPPINGNAME);
  FD.append("ShippingPhoto", SHIPPINGPHOTO);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (SHIPPINGNAME === "") {
    alert("Please input Shipping Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "11010.ShippingLogoCreate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Create Success", ""));
          fetch_data();
          $("#addShippingLogo").modal("hide");
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      window.location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editShippingLogo", async function () {
  var SHIPPINGID = $(this).attr("ShippingID");
  var STATUSID = $(this).attr("StatusID");
  var SHIPPINGNAME = $(this).attr("ShippingName");
  var SHIPPINGPHOTO = $(this).attr("ShippingPhoto");

  $("#EditShippingID").val(SHIPPINGID);
  $("#EditStatusID").val(STATUSID);
  $("#EditShippingName").val(SHIPPINGNAME);
  $("#EditShippingPhotoBeforeConvert").val(SHIPPINGPHOTO);

  $("#editShippingLogo").modal("show");
});

// Before Edit
EditShippingPhoto.onchange = (evt) => {
  const [file] = EditShippingPhoto.files;
  if (file) {
    PreviewEditShippingPhoto.src = URL.createObjectURL(file);
  }
};

async function updateShippingLogo() {
  var FD = new FormData();

  var SHIPPINGID = $("#EditShippingID").val();
  var STATUSID = $("#EditStatusID").val();
  var SHIPPINGNAME = $("#EditShippingName").val();
  var SHIPPINGPHOTO = $("#EditShippingPhoto")[0].files[0];
  var SHIPPINGPHOTOBEFORECONVERT = $("#EditShippingPhotoBeforeConvert").val();
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("ShippingID", SHIPPINGID);
  FD.append("StatusID", STATUSID);
  FD.append("ShippingName", SHIPPINGNAME);
  FD.append("ShippingPhoto", SHIPPINGPHOTO);
  FD.append("ShippingPhotoBeforeConvert", SHIPPINGPHOTOBEFORECONVERT);
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  if (SHIPPINGID == "") {
    alert("Shipping Undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (SHIPPINGNAME === "") {
    alert("Please input Shipping Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "11030.ShippingLogoUpdate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Update Success", ""));
          fetch_data();
          $("#editPaymentLogo").modal("hide");
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      window.location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".deleteShippingLogo", async function () {
  var SHIPPINGID = $(this).attr("ShippingID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "11040.ShippingLogoDelete.php?id=" + Math.random(),
      data: {
        ShippingID: SHIPPINGID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert(data.replace("Delete Success", ""));
            fetch_data();
          } else {
            alert(data);
          }
        } catch (err) {
          alert(err.message);
        }
        window.location.reload();
      },
      error: function () {
        alert("Error");
      },
    });
  }
});

$(document).on("click", ".activeShippingLogo", async function () {
  var SHIPPINGID = $(this).attr("ShippingID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "11050.ShippingLogoActive.php?id=" + Math.random(),
      data: {
        ShippingID: SHIPPINGID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert(data.replace("Activate Success", ""));
            fetch_data();
          } else {
            alert(data);
          }
        } catch (err) {
          alert(err.message);
        }
        window.location.reload();
      },
      error: function () {
        alert("Error");
      },
    });
  }
});

$(document).on("click", ".debugShippingLogo", async function () {
  var SHIPPINGID = $(this).attr("ShippingID");
  alert("DEBUG INFO\n\rShippingID : " + SHIPPINGID);
});
