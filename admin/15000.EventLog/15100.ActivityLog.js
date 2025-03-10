fetch_data();

async function showButtonActivityLogData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var EVENTLOGTIMESTAMP = document.getElementById(
    "FilterEventLogTimeStamp"
  ).value;
  var EVENTLOGUSER = document.getElementById("FilterEventLogUser").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "15120.ActivityLogFetch.php?id=" + Math.random(),
    data: {
      EventLogUser: EVENTLOGUSER,
      EventLogTimeStamp: EVENTLOGTIMESTAMP,
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
            order: [[0, "desc"]],
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
