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
            alert(data.replace("Truncate Success", ""));
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
}
