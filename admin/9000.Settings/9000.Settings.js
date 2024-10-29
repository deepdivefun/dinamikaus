fetch_data();

async function showButtonSettingsData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var SETTINGSNAME = document.getElementById("FilterSettingsName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "9020.SettingsFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      SettingsName: SETTINGSNAME,
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

async function createSettings() {
  var STATUSID = document.getElementById("StatusID").value;
  var SETTINGSNAME = document.getElementById("SettingsName").value;
  var SETTINGSVALUE = document.getElementById("SettingsValue").value;
  var CREATEBY = document.getElementById("CreateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (SETTINGSNAME === "") {
    alert("Please input Settings Name");
    return;
  }

  if (SETTINGSVALUE === "") {
    alert("Please input Settings Value");
    return;
  }

  $.ajax({
    type: "POST",
    url: "9010.SettingsCreate.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      SettingsName: SETTINGSNAME,
      SettingsValue: SETTINGSVALUE,
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
      $("#addSettings").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editSettings", function () {
  var SETTINGSID = $(this).attr("SettingsID");
  var STATUSID = $(this).attr("StatusID");
  var SETTINGSNAME = $(this).attr("SettingsName");
  var SETTINGSVALUE = $(this).attr("SettingsValue");

  $("#EditSettingsID").val(SETTINGSID);
  $("#EditStatusID").val(STATUSID);
  $("#EditSettingsName").val(SETTINGSNAME);
  $("#EditSettingsValue").val(SETTINGSVALUE);

  $("#editSettings").modal("show");
});

async function updateSettings() {
  var SETTINGSID = document.getElementById("EditSettingsID").value;
  var STATUSID = document.getElementById("EditStatusID").value;
  var SETTINGSNAME = document.getElementById("EditSettingsName").value;
  var SETTINGSVALUE = document.getElementById("EditSettingsValue").value;
  var UpdateBy = document.getElementById("UpdateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (SETTINGSID == "") {
    alert("Undefined SettingsID");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (SETTINGSNAME === "") {
    alert("Please input Settings Name");
    return;
  }

  if (SETTINGSVALUE === "") {
    alert("Please input Settings Value");
    return;
  }

  $.ajax({
    type: "POST",
    url: "9030.SettingsUpdate.php?id=" + Math.random(),
    data: {
      SettingsID: SETTINGSID,
      StatusID: STATUSID,
      SettingsName: SETTINGSNAME,
      SettingsValue: SETTINGSVALUE,
      GToken: GTOKEN,
      UpdateBy: UpdateBy,
    },
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
      $("#editSettings").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".debugSettings", function () {
  var SETTINGSID = $(this).attr("SettingsID");
  alert("DEBUG INFO\n\rSettingsID : " + SETTINGSID);
});
