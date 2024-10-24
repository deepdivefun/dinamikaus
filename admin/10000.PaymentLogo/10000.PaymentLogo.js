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

  if (PAYMENTPHOTO === "") {
    alert("Please insert Payment Photo");
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
