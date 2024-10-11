fetch_data();

async function showButtonTeamData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var FULLNAME = document.getElementById("FillterFullName").value;
  var POSITION = document.getElementById("FilterPosition").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "3020.TeamFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      FullName: FULLNAME,
      Position: POSITION,
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
TeamPhoto.onchange = (evt) => {
  const [file] = TeamPhoto.files;
  if (file) {
    PreviewTeamPhoto.src = URL.createObjectURL(file);
  }
};

async function createTeam() {
  var FD = new FormData();

  var STATUSID = $("#StatusID").val();
  var FULLNAME = $("#FullName").val();
  var POSITION = $("#Position").val();
  var LINKEDIN = $("#Linkedin").val();
  var INSTAGRAM = $("#Instagram").val();
  var TEAMPHOTO = $("#TeamPhoto")[0].files[0];
  var CREATEBY = $("#CreateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("StatusID", STATUSID);
  FD.append("FullName", FULLNAME);
  FD.append("Position", POSITION);
  FD.append("Linkedin", LINKEDIN);
  FD.append("Instagram", INSTAGRAM);
  FD.append("TeamPhoto", TEAMPHOTO);
  FD.append("CreateBy", CREATEBY);
  FD.append("GToken", GTOKEN);

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (FULLNAME === "") {
    alert("Please enter Full Name");
    return;
  }

  if (POSITION === "") {
    alert("Please input Position");
    return;
  }

  if (TEAMPHOTO === "") {
    alert("Please insert Team Photo");
    return;
  }

  $.ajax({
    type: "POST",
    url: "3010.TeamCreate.php?id=" + Math.random(),
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
      $("#addTeam").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".editTeam", function () {
  var TEAMID = $(this).attr("TeamID");
  var STATUSID = $(this).attr("StatusID");
  var FULLNAME = $(this).attr("FullName");
  var POSITION = $(this).attr("Position");
  var LINKEDIN = $(this).attr("Linkedin");
  var INSTAGRAM = $(this).attr("Instagram");
  var TEAMPHOTO = $(this).attr("TeamPhoto");

  $("#EditTeamID").val(TEAMID);
  $("#EditStatusID").val(STATUSID);
  $("#EditFullName").val(FULLNAME);
  $("#EditPosition").val(POSITION);
  $("#EditLinkedin").val(LINKEDIN);
  $("#EditInstagram").val(INSTAGRAM);
  $("#EditTeamPhotoBeforeConvert").val(TEAMPHOTO);

  $("#editTeam").modal("show");
});

// Before Update
EditTeamPhoto.onchange = (evt) => {
  const [file] = EditTeamPhoto.files;
  if (file) {
    PreviewEditTeamPhoto.src = URL.createObjectURL(file);
  }
};

async function updateTeam() {
  var FD = new FormData();

  var TEAMID = $("#EditTeamID").val();
  var STATUSID = $("#EditStatusID").val();
  var FULLNAME = $("#EditFullName").val();
  var POSITION = $("#EditPosition").val();
  var LINKEDIN = $("#EditLinkedin").val();
  var INSTAGRAM = $("#EditInstagram").val();
  var TEAMPHOTO = $("#EditTeamPhoto")[0].files[0];
  var TEAMPHOTOBEFORECONVERT = $("#EditTeamPhotoBeforeConvert").val();
  var UPDATEBY = $("#UpdateBy").val();
  var GTOKEN = $("#GToken").val();

  FD.append("TeamID", TEAMID);
  FD.append("StatusID", STATUSID);
  FD.append("FullName", FULLNAME);
  FD.append("Position", POSITION);
  FD.append("Linkedin", LINKEDIN);
  FD.append("Instagram", INSTAGRAM);
  FD.append("TeamPhoto", TEAMPHOTO);
  FD.append("TeamPhotoBeforeConvert", TEAMPHOTOBEFORECONVERT);
  FD.append("UpdateBy", UPDATEBY);
  FD.append("GToken", GTOKEN);

  if (TEAMID == "") {
    alert("TeamID undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (FULLNAME === "") {
    alert("Please enter Full Name");
    return;
  }

  if (POSITION === "") {
    alert("Please input Position");
    return;
  }

  if (TEAMPHOTO === "") {
    alert("Please insert Team Photo");
    return;
  }

  $.ajax({
    type: "POST",
    url: "3030.TeamUpdate.php?id=" + Math.random(),
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
      $("#editTeam").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".deleteTeam", function () {
  var TEAMID = $(this).attr("TeamID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "3040.TeamDelete.php?id=" + Math.random(),
      data: {
        TeamID: TEAMID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Delete Success");
          } else {
            alert(data);
          }
        } catch (err) {
          alert(err.message);
        }
        fetch_data();
      },
      error: function () {
        alert("Error");
      },
    });
  }
});

$(document).on("click", ".activeTeam", function () {
  var TEAMID = $(this).attr("TeamID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "3050.TeamActive.php?id=" + Math.random(),
      data: {
        TeamID: TEAMID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Activate Success");
          } else {
            alert(data);
          }
        } catch (err) {
          alert(err.message);
        }
        fetch_data();
      },
      error: function () {
        alert("Error");
      },
    });
  }
});

$(document).on("click", ".debugTeam", function () {
  var TEAMID = $(this).attr("TeamID");
  alert("DEBUG INFO\n\rTeamID : " + TEAMID);
});
