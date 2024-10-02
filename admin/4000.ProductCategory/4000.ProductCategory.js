fetch_data();

async function showButtonProductCategoryData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var PRODUCTCATEGORYNAME = document.getElementById(
    "FilterProductCategoryName"
  ).value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "4020.ProductCategoryFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ProductCategoryName: PRODUCTCATEGORYNAME,
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

async function createProductCategory() {
  var FD = new FormData();

  var STATUSID = $("#StatusID").val();
  var PRODUCTCATEGORYNAME = $("#ProductCategoryName").val();
  var PRODUCTCATEGORYCATALOG = $("#ProductCategoryCatalog")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("StatusID", STATUSID);
  FD.append("ProductCategoryName", PRODUCTCATEGORYNAME);
  FD.append("ProductCategoryCatalog", PRODUCTCATEGORYCATALOG);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PRODUCTCATEGORYNAME === "") {
    alert("Please input Product Category Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "4010.ProductCategoryCreate.php?id=" + Math.random(),
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
      $("#addProductCategory").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editProductCategory", function () {
  var PRODUCTCATEGORYID = $(this).attr("ProductCategoryID");
  var STATUSID = $(this).attr("StatusID");
  var PRODUCTCATEGORYNAME = $(this).attr("ProductCategoryName");
  var PRODUCTCATEGORYCATALOG = $(this).attr("ProductCategoryCatalog");

  $("#EditProductCategoryID").val(PRODUCTCATEGORYID);
  $("#EditStatusID").val(STATUSID);
  $("#EditProductCategoryName").val(PRODUCTCATEGORYNAME);
  $("#EditProductCategoryCatalogBeforeConvert").val(PRODUCTCATEGORYCATALOG);

  $("#editProductCategory").modal("show");
});

async function updateProductCategory() {
  var FD = new FormData();

  var PRODUCTCATEGORYID = $("#EditProductCategoryID").val();
  var STATUSID = $("#EditStatusID").val();
  var PRODUCTCATEGORYNAME = $("#EditProductCategoryName").val();
  var PRODUCTCATEGORYCATALOG = $("#EditProductCategoryCatalog")[0].files[0];
  var PRODUCTCATEGORYCATALOGBEFORECONVERT = $(
    "#EditProductCategoryCatalogBeforeConvert"
  ).val();
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("ProductCategoryID", PRODUCTCATEGORYID);
  FD.append("StatusID", STATUSID);
  FD.append("ProductCategoryName", PRODUCTCATEGORYNAME);
  FD.append("ProductCategoryCatalog", PRODUCTCATEGORYCATALOG);
  FD.append(
    "ProductCategoryCatalogBeforeConvert",
    PRODUCTCATEGORYCATALOGBEFORECONVERT
  );
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  if (PRODUCTCATEGORYID == "") {
    alert("ProductCategoryID Undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PRODUCTCATEGORYNAME === "") {
    alert("Please input Product Category Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "4030.ProductCategoryUpdate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
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
      $("#editProductCategory").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".deleteProductCategory", function () {
  var PRODUCTCATEGORYID = $(this).attr("ProductCategoryID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "4040.ProductCategoryDelete.php?id=" + Math.random(),
      data: {
        ProductCategoryID: PRODUCTCATEGORYID,
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

$(document).on("click", ".activeProductCategory", function () {
  var PRODUCTCATEGORYID = $(this).attr("ProductCategoryID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "4050.ProductCategoryActive.php?id=" + Math.random(),
      data: {
        ProductCategoryID: PRODUCTCATEGORYID,
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

$(document).on("click", ".viewPDF", function () {
  var PRODUCTCATEGORYID = $(this).attr("ProductCategoryID");
  var PRODUCTCATEGORYCATALOG = $(this).attr("ProductCategoryCatalog");

  document.getElementById("ReadProductCategoryID").value = PRODUCTCATEGORYID;
  document.getElementById("ReadPDFProductCategory");

  const ReadPDFProductCategory = document.getElementById(
    "ReadPDFProductCategory"
  );
  ReadPDFProductCategory.innerHTML =
    "<iframe src='../assets/catalog/" +
    PRODUCTCATEGORYCATALOG +
    "'style='width:100%;height:100%;text-align:center;'>";

  $("#viewPDF").modal("show");
});

$(document).on("click", ".debugProductCategory", function () {
  var PRODUCTCATEGORYID = $(this).attr("ProductCategoryID");
  alert("DEBUG INFO\n\rProductCategoryID : " + PRODUCTCATEGORYID);
});
