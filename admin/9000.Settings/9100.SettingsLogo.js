fetch_data();

async function showButtonSettingsLogoData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var SETTINGSLOGONAME = document.getElementById(
    "FilterSettingsLogoName"
  ).value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "9120.SettingsLogoFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      SettingsLogoName: SETTINGSLOGONAME,
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
SettingsLogoValue.onchange = (evt) => {
  const [file] = SettingsLogoValue.files;
  if (file) {
    PreviewSettingsLogoValue.src = URL.createObjectURL(file);
  }
};

async function createSettingsLogo() {
  var FD = new FormData();

  var STATUSID = $("#StatusID").val();
  var SETTINGSLOGONAME = $("#SettingsLogoName").val();
  var SETTINGSLOGOVALUE = $("#SettingsLogoValue")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("StatusID", STATUSID);
  FD.append("SettingsLogoName", SETTINGSLOGONAME);
  FD.append("SettingsLogoValue", SETTINGSLOGOVALUE);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (SETTINGSLOGONAME === "") {
    alert("Please enter Our Settings Logo Name");
    return;
  }

  if (SETTINGSLOGOVALUE === "") {
    alert("Please insert Our Settings Logo Value");
    return;
  }

  $.ajax({
    type: "POST",
    url: "9110.SettingsLogoCreate.php?id=" + Math.random(),
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
      $("#addSettingsLogo").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editSettingsLogo", function () {
  var SETTINGSLOGOID = $(this).attr("SettingsLogoID");
  var STATUSID = $(this).attr("StatusID");
  var SETTINGSLOGONAME = $(this).attr("SettingsLogoName");
  var SETTINGSLOGOVALUE = $(this).attr("SettingsLogoValue");

  $("#EditSettingsLogoID").val(SETTINGSLOGOID);
  $("#EditStatusID").val(STATUSID);
  $("#EditSettingsLogoName").val(SETTINGSLOGONAME);
  $("#EditSettingsLogoValueBeforeConvert").val(SETTINGSLOGOVALUE);

  $("#editSettingsLogo").modal("show");
});

// Before Edit
EditSettingsLogoValue.onchange = (evt) => {
  const [file] = EditSettingsLogoValue.files;
  if (file) {
    PreviewEditSettingsLogoValue.src = URL.createObjectURL(file);
  }
};

async function updateSettingsLogo() {
  var FD = new FormData();

  var SETTINGSLOGOID = $("#EditSettingsLogoID").val();
  var STATUSID = $("#EditStatusID").val();
  var SETTINGSLOGONAME = $("#EditSettingsLogoName").val();
  var SETTINGSLOGOVALUE = $("#EditSettingsLogoValue")[0].files[0];
  var SETTINGSLOGOVALUEBEFORECONVERT = $(
    "#EditSettingsLogoValueBeforeConvert"
  ).val();
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("SettingsLogoID", SETTINGSLOGOID);
  FD.append("StatusID", STATUSID);
  FD.append("SettingsLogoName", SETTINGSLOGONAME);
  FD.append("SettingsLogoValue", SETTINGSLOGOVALUE);
  FD.append("SettingsLogoValueBeforeConvert", SETTINGSLOGOVALUEBEFORECONVERT);
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  if (SETTINGSLOGOID == "") {
    alert("SettingsLogoID Undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (SETTINGSLOGONAME === "") {
    alert("Please enter Our Settings Logo Name");
    return;
  }

  $.ajax({
    type: "POST",
    url: "9130.SettingsLogoUpdate.php?id=" + Math.random(),
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
      $("#editSettingsLogo").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".debugSettingsLogo", function () {
  var SETTINGSLOGOID = $(this).attr("SettingsLogoID");
  alert("DEBUG INFO\n\rSettingsLogoID : " + SETTINGSLOGOID);
});
