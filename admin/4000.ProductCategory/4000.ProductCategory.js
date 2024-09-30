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
  var STATUSID = document.getElementById("StatusID").value;
  var PRODUCTCATEGORYNAME = document.getElementById(
    "ProductCategoryName"
  ).value;
  var CREATEBY = document.getElementById("CreateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

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
    data: {
      StatusID: STATUSID,
      ProductCategoryName: PRODUCTCATEGORYNAME,
      CreateBy: CREATEBY,
      GToken: GTOKEN,
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
      $("#addProductCategory").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".debugProductCategory", function () {
  var PRODUCTCATEGORYID = $(this).attr("ProductCategoryID");
  alert("DEBUG INFO\n\rProductCategoryID : " + PRODUCTCATEGORYID);
});