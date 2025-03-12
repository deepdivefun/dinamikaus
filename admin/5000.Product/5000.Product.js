fetch_data();

async function showButtonProductData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var PRODUCTCATEGORYID = document.getElementById(
    "FilterProductCategoryID"
  ).value;
  var PRODUCTBRANDID = document.getElementById("FilterProductBrandID").value;
  var PRODUCTNAME = document.getElementById("FilterProductName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "5020.ProductFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ProductCategoryID: PRODUCTCATEGORYID,
      ProductBrandID: PRODUCTBRANDID,
      ProductName: PRODUCTNAME,
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
ProductPhoto.onchange = (evt) => {
  const [file] = ProductPhoto.files;
  if (file) {
    PreviewProductPhoto.src = URL.createObjectURL(file);
  }
};

async function createProduct() {
  var FD = new FormData();

  var PRODUCTCATEGORYID = $("#ProductCategoryID").val();
  var PRODUCTBRANDID = $("#ProductBrandID").val();
  var STATUSID = $("#StatusID").val();
  var PRODUCTNAME = $("#ProductName").val();
  var PRODUCTPRICE = $("#ProductPrice").val();
  var PRODUCTDESCRIPTION = $("#ProductDescription").val();
  var PRODUCTPHOTO = $("#ProductPhoto")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("ProductCategoryID", PRODUCTCATEGORYID);
  FD.append("ProductBrandID", PRODUCTBRANDID);
  FD.append("StatusID", STATUSID);
  FD.append("ProductName", PRODUCTNAME);
  FD.append("ProductPrice", PRODUCTPRICE);
  FD.append("ProductDescription", PRODUCTDESCRIPTION);
  FD.append("ProductPhoto", PRODUCTPHOTO);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (PRODUCTCATEGORYID == "") {
    alert("Please select Product Category");
    return;
  }

  if (PRODUCTBRANDID == "") {
    alert("Please select Product Brand Name");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PRODUCTNAME === "") {
    alert("Please enter Product Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "5010.ProductCreate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Create Success", ""));
          fetch_data();
          $("#addProduct").modal("hide");
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

$(document).on("click", ".editProduct", async function () {
  var PRODUCTID = $(this).attr("ProductID");
  var PRODUCTCATEGORYID = $(this).attr("ProductCategoryID");
  var PRODUCTBRANDID = $(this).attr("ProductBrandID");
  var STATUSID = $(this).attr("StatusID");
  var PRODUCTNAME = $(this).attr("ProductName");
  var PRODUCTPRICE = $(this).attr("ProductPrice");
  var PRODUCTDESCRIPTION = $(this).attr("ProductDescription");
  var PRODUCTPHOTO = $(this).attr("ProductPhoto");

  $("#EditProductID").val(PRODUCTID);
  $("#EditProductCategoryID").val(PRODUCTCATEGORYID);
  $("#EditProductBrandID").val(PRODUCTBRANDID);
  $("#EditStatusID").val(STATUSID);
  $("#EditProductName").val(PRODUCTNAME);
  $("#EditProductPrice").val(PRODUCTPRICE);
  $("#EditProductDescription").val(PRODUCTDESCRIPTION);
  $("#EditProductPhotoBeforeConvert").val(PRODUCTPHOTO);

  $("#editProduct").modal("show");
});

// Before Update
EditProductPhoto.onchange = (evt) => {
  const [file] = EditProductPhoto.files;
  if (file) {
    PreviewEditProductPhoto.src = URL.createObjectURL(file);
  }
};

async function updateProduct() {
  var FD = new FormData();

  var PRODUCTID = $("#EditProductID").val();
  var PRODUCTCATEGORYID = $("#EditProductCategoryID").val();
  var PRODUCTBRANDID = $("#EditProductBrandID").val();
  var STATUSID = $("#EditStatusID").val();
  var PRODUCTNAME = $("#EditProductName").val();
  var PRODUCTPRICE = $("#EditProductPrice").val();
  var PRODUCTDESCRIPTION = $("#EditProductDescription").val();
  var PRODUCTPHOTO = $("#EditProductPhoto")[0].files[0];
  var PRODUCTPHOTOBEFORECONVERT = $("#EditProductPhotoBeforeConvert").val();
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("ProductID", PRODUCTID);
  FD.append("ProductCategoryID", PRODUCTCATEGORYID);
  FD.append("ProductBrandID", PRODUCTBRANDID);
  FD.append("StatusID", STATUSID);
  FD.append("ProductName", PRODUCTNAME);
  FD.append("ProductPrice", PRODUCTPRICE);
  FD.append("ProductDescription", PRODUCTDESCRIPTION);
  FD.append("ProductPhoto", PRODUCTPHOTO);
  FD.append("ProductPhotoBeforeConvert", PRODUCTPHOTOBEFORECONVERT);
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  if (PRODUCTID == "") {
    alert("ProductID Undefined");
    return;
  }

  if (PRODUCTCATEGORYID == "") {
    alert("Please select Product Category");
    return;
  }

  if (PRODUCTBRANDID == "") {
    alert("Please select Product Brand Name");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (PRODUCTNAME === "") {
    alert("Please input Product Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "5030.ProductUpdate.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Update Success", ""));
          fetch_data();
          $("#editProduct").modal("hide");
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

async function uploadDataProduct() {
  var FD = new FormData();

  var UPLOADDATAPRODUCT = $("#UploadDataProduct")[0].files[0];
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("UploadDataProduct", UPLOADDATAPRODUCT);
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  $.ajax({
    type: "POST",
    url: "5070.ProductUpload.php?id=" + Math.random(),
    data: FD,
    contentType: false,
    processData: false,
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert("Upload Data Product Success");
          fetch_data();
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".deleteProduct", async function () {
  var PRODUCTID = $(this).attr("ProductID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "5040.ProductDelete.php?id=" + Math.random(),
      data: {
        ProductID: PRODUCTID,
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

$(document).on("click", ".activeProduct", async function () {
  var PRODUCTID = $(this).attr("ProductID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "5050.ProductActive.php?id=" + Math.random(),
      data: {
        ProductID: PRODUCTID,
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

$(document).on("click", ".debugProduct", async function () {
  var PRODUCTID = $(this).attr("ProductID");
  alert("DEBUG INFO\n\rProductID : " + PRODUCTID);
});
