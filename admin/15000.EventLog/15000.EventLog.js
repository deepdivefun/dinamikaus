fetch_data();

async function showButtonEventLogData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var EVENTLOGUSER = document.getElementById("FilterEventLogUser").value;
  var EVENTLOGTIMESTAMP = document.getElementById(
    "FilterEventLogTimeStamp"
  ).value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "15020.EventLogFetch.php?id=" + Math.random(),
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
