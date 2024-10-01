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
  var PRODUCTNAME = document.getElementById("FilterProductName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "5020.ProductFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ProductCategoryID: PRODUCTCATEGORYID,
      ProductName: PRODUCTNAME,
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
ProductPhoto.onchange = (evt) => {
  const [file] = ProductPhoto.files;
  if (file) {
    PreviewProductPhoto.src = URL.createObjectURL(file);
  }
};

async function createProduct() {
  var FD = new FormData();

  var PRODUCTCATEGORYID = $("#ProductCategoryID").val();
  var STATUSID = $("#StatusID").val();
  var PRODUCTNAME = $("#ProductName").val();
  var PRODUCTDESCRIPTION = $("#ProductDescription").val();
  var PRODUCTPHOTO = $("#ProductPhoto")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("ProductCategoryID", PRODUCTCATEGORYID);
  FD.append("StatusID", STATUSID);
  FD.append("ProductName", PRODUCTNAME);
  FD.append("ProductDescription", PRODUCTDESCRIPTION);
  FD.append("ProductPhoto", PRODUCTPHOTO);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (PRODUCTCATEGORYID == "") {
    alert("Please select Status");
  }

  if (STATUSID == "") {
    alert("Please select Status");
  }

  if (PRODUCTNAME === "") {
    alert("Please enter Product Name");
  }

  if (PRODUCTPHOTO === "") {
    alert("Please insert Product Photo");
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
          alert("Create Success");
          fetch_data();
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      fetch_data();
      $("#addProduct").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".debugProduct", function () {
  var PRODUCTID = $(this).attr("ProductID");
  alert("DEBUG INFO\n\rProductID : " + PRODUCTID);
});
