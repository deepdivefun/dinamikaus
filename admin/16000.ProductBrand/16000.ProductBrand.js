fetch_data();

async function showButtonProductBrandData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var PRODUCTBRANDNAME = document.getElementById(
    "FilterProductBrandName"
  ).value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "16020.ProductBrandFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ProductBrandName: PRODUCTBRANDNAME,
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

async function createProductBrand() {
  var STATUSID = document.getElementById("StatusID").value;
  var PRODUCTBRANDNAME = document.getElementById("ProductBrandName").value;
  var CREATEBY = document.getElementById("CreateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PRODUCTBRANDNAME === "") {
    alert("Please input Product Brand Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "16010.ProductBrandCreate.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ProductBrandName: PRODUCTBRANDNAME,
      CreateBy: CREATEBY,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Create Success", ""));
          fetch_data();
          $("#addProductBrand").modal("hide");
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

$(document).on("click", ".editProductBrand", async function () {
  var PRODUCTBRANDID = $(this).attr("ProductBrandID");
  var STATUSID = $(this).attr("StatusID");
  var PRODUCTBRANDNAME = $(this).attr("ProductBrandName");

  $("#EditProductBrandID").val(PRODUCTBRANDID);
  $("#EditStatusID").val(STATUSID);
  $("#EditProductBrandName").val(PRODUCTBRANDNAME);

  $("#editProductBrand").modal("show");
});

async function updateProductBrand() {
  var PRODUCTBRANDID = document.getElementById("EditProductBrandID").value;
  var STATUSID = document.getElementById("EditStatusID").value;
  var PRODUCTBRANDNAME = document.getElementById("EditProductBrandName").value;
  var UPDATEBY = document.getElementById("UpdateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (PRODUCTBRANDID == "") {
    alert("ProductBrandID Undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PRODUCTBRANDNAME === "") {
    alert("Please input Product Brand Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "16030.ProductBrandUpdate.php?id=" + Math.random(),
    data: {
      ProductBrandID: PRODUCTBRANDID,
      StatusID: STATUSID,
      ProductBrandName: PRODUCTBRANDNAME,
      UpdateBy: UPDATEBY,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Update Success", ""));
          fetch_data();
          $("#editProductBrand").modal("hide");
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

$(document).on("click", ".deleteProductBrand", async function () {
  var PRODUCTBRANDID = $(this).attr("ProductBrandID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "16040.ProductBrandDelete.php?id=" + Math.random(),
      data: {
        ProductBrandID: PRODUCTBRANDID,
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

$(document).on("click", ".activeProductBrand", async function () {
  var PRODUCTBRANDID = $(this).attr("ProductBrandID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "16050.ProductBrandActive.php?id=" + Math.random(),
      data: {
        ProductBrandID: PRODUCTBRANDID,
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

$(document).on("click", ".debugProductBrand", async function () {
  var PRODUCTBRANDID = $(this).attr("ProductBrandID");
  alert("DEBUG INFO\n\rProductBrandID : " + PRODUCTBRANDID);
});
