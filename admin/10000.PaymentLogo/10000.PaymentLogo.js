fetch_data();

async function showButtonPaymentLogoData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var PAYMENTNAME = document.getElementById("FilterPaymentName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "10020.PaymentLogoFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      PaymentName: PAYMENTNAME,
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

// Before Create
PaymentPhoto.onchange = (evt) => {
  const [file] = PaymentPhoto.files;
  if (file) {
    PreviewPaymentPhoto.src = URL.createObjectURL(file);
  }
};

async function createPaymentLogo() {
  var FD = new FormData();

  var STATUSID = $("#StatusID").val();
  var PAYMENTNAME = $("#PaymentName").val();
  var PAYMENTPHOTO = $("#PaymentPhoto")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("StatusID", STATUSID);
  FD.append("PaymentName", PAYMENTNAME);
  FD.append("PaymentPhoto", PAYMENTPHOTO);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PAYMENTNAME === "") {
    alert("Please input Payment Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "10010.PaymentLogoCreate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
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
      $("#addPaymentPhoto").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editPaymentLogo", function () {
  var PAYMENTID = $(this).attr("PaymentID");
  var STATUSID = $(this).attr("StatusID");
  var PAYMENTNAME = $(this).attr("PaymentName");
  var PAYMENTPHOTO = $(this).attr("PaymentPhoto");

  $("#EditPaymentID").val(PAYMENTID);
  $("#EditStatusID").val(STATUSID);
  $("#EditPaymentName").val(PAYMENTNAME);
  $("#EditPaymentPhotoBeforeConvert").val(PAYMENTPHOTO);

  $("#editPaymentLogo").modal("show");
});

// Before Edit
EditPaymentPhoto.onchange = (evt) => {
  const [file] = EditPaymentPhoto.files;
  if (file) {
    PreviewEditPaymentPhoto.src = URL.createObjectURL(file);
  }
};

async function updatePaymentLogo() {
  var FD = new FormData();

  var PAYMENTID = $("#EditPaymentID").val();
  var STATUSID = $("#EditStatusID").val();
  var PAYMENTNAME = $("#EditPaymentName").val();
  var PAYMENTPHOTO = $("#EditPaymentPhoto")[0].files[0];
  var PAYMENTPHOTOBEFORECONVERT = $("#EditPaymentPhotoBeforeConvert").val();
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("PaymentID", PAYMENTID);
  FD.append("StatusID", STATUSID);
  FD.append("PaymentName", PAYMENTNAME);
  FD.append("PaymentPhoto", PAYMENTPHOTO);
  FD.append("PaymentPhotoBeforeConvert", PAYMENTPHOTOBEFORECONVERT);
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  if (PAYMENTID == "") {
    alert("PaymentID Undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PAYMENTNAME === "") {
    alert("Please input Payment Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "10030.PaymentLogoUpdate.php?id=" + Math.random(),
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
      $("#editPaymentLogo").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".deletePaymentLogo", function () {
  var PAYMENTID = $(this).attr("PaymentID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "10040.PaymentLogoDelete.php?id=" + Math.random(),
      data: {
        PaymentID: PAYMENTID,
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

$(document).on("click", ".activePaymentLogo", function () {
  var PAYMENTID = $(this).attr("PaymentID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "10050.PaymentLogoActive.php?id=" + Math.random(),
      data: {
        PaymentID: PAYMENTID,
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

$(document).on("click", ".debugPaymentLogo", function () {
  var PAYMENTID = $(this).attr("PaymentID");
  alert("DEBUG INFO\n\rPaymentID : " + PAYMENTID);
});
