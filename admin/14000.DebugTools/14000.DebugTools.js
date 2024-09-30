async function truncateEventLog() {
  var GTOKEN = document.getElementById("GToken").value;

  let confirmDelete = prompt(
    "Please input 'DELETE EVENT LOG' to confirm delete",
    ""
  );

  if (confirmDelete !== "DELETE EVENT LOG") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "14080.DebugToolsTruncateEventLog.php?id=" + Math.random(),
      data: {
        GToken: GTOKEN,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Truncate Success");
          } else {
            alert(data);
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
}

async function truncateSystemLog() {
  var GTOKEN = document.getElementById("GToken").value;

  let confirmDelete = prompt(
    "Please input 'DELETE SYSTEM LOG' to confirm delete",
    ""
  );

  if (confirmDelete !== "DELETE SYSTEM LOG") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "14090.DebugToolsTruncateSystemLog.php?id=" + Math.random(),
      data: {
        GToken: GTOKEN,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Truncate Success");
          } else {
            alert(data);
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
}
