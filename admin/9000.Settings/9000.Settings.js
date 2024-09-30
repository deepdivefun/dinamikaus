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

$(document).on("click", ".editSettings", function () {
  var SETTINGSID = $(this).attr("SettingsID");
  var STATUSID = $(this).attr("StatusID");
  var SETTINGSNAME = $(this).attr("SettingsName");
  var SETTINGSCONTENTS = $(this).attr("SettingsContents");

  document.getElementById("SettingsID").value = SETTINGSID;
  document.getElementById("StatusID").value = STATUSID;
  document.getElementById("SettingsName").value = SETTINGSNAME;
  document.getElementById("SettingsContents").value = SETTINGSCONTENTS;

  $("#editSettings").modal("show");
});

async function updateSettings() {
  var SETTINGSID = document.getElementById("SettingsID").value;
  var STATUSID = document.getElementById("StatusID").value;
  var SETTINGSCONTENTS = document.getElementById("SettingsContents").value;
  var GTOKEN = document.getElementById("GToken").value;
  var UpdateBy = document.getElementById("UpdateBy").value;

  $.ajax({
    type: "POST",
    url: "9030.SettingsUpdate.php?id=" + Math.random(),
    data: {
      SettingsID: SETTINGSID,
      StatusID: STATUSID,
      SettingsContents: SETTINGSCONTENTS,
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
