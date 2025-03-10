fetch_data();

async function showButtonUserData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var ROLEID = document.getElementById("FilterRoleID").value;
  var USERNAME = document.getElementById("FilterUsername").value;
  var EMAIL = document.getElementById("FilterEmail").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "2020.UserFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      RoleID: ROLEID,
      Username: USERNAME,
      Email: EMAIL,
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

async function createUser() {
  var ROLEID = document.getElementById("RoleID").value;
  var STATUSID = document.getElementById("StatusID").value;
  var USERNAME = document.getElementById("Username").value;
  var PASSWORD = document.getElementById("Password").value;
  var CONFIRMPASSWORD = document.getElementById("ConfirmPassword").value;
  var EMAIL = document.getElementById("Email").value;
  var FULLNAME = document.getElementById("FullName").value;
  var CREATEBY = document.getElementById("CreateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (ROLEID == "") {
    alert("Please select Role");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (USERNAME === "") {
    alert("Please input Username");
    return;
  }

  if (PASSWORD === "") {
    alert("Please input Password");
    return;
  }

  if (CONFIRMPASSWORD === "") {
    alert("Please input Confirm Password");
    return;
  }

  if (EMAIL === "") {
    alert("Please input Email");
    return;
  }

  if (FULLNAME === "") {
    alert("Please input Full Name");
    return;
  }

  if (PASSWORD !== CONFIRMPASSWORD) {
    alert("Password and Confirm Password not match");
    return;
  }

  $.ajax({
    type: "POST",
    url: "2010.UserCreate.php?id=" + Math.random(),
    data: {
      RoleID: ROLEID,
      StatusID: STATUSID,
      Username: USERNAME,
      Password: PASSWORD,
      ConfirmPassword: CONFIRMPASSWORD,
      Email: EMAIL,
      FullName: FULLNAME,
      CreateBy: CREATEBY,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Create Success", ""));
          fetch_data();
          $("#addUser").modal("hide");
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

$(document).on("click", ".editUser", async function () {
  var USERID = $(this).attr("UserID");
  var ROLEID = $(this).attr("RoleID");
  var STATUSID = $(this).attr("StatusID");
  var USERNAME = $(this).attr("Username");
  var EMAIL = $(this).attr("Email");
  var FULLNAME = $(this).attr("FullName");

  document.getElementById("EditUserID").value = USERID;
  document.getElementById("EditRoleID").value = ROLEID;
  document.getElementById("EditStatusID").value = STATUSID;
  document.getElementById("EditUsername").value = USERNAME;
  document.getElementById("EditEmail").value = EMAIL;
  document.getElementById("EditFullName").value = FULLNAME;

  $("#editUser").modal("show");
});

async function updateUser() {
  var USERID = document.getElementById("EditUserID").value;
  var ROLEID = document.getElementById("EditRoleID").value;
  var STATUSID = document.getElementById("EditStatusID").value;
  var USERNAME = document.getElementById("EditUsername").value;
  var PASSWORD = document.getElementById("EditPassword").value;
  var CONFIRMPASSWORD = document.getElementById("EditConfirmPassword").value;
  var EMAIL = document.getElementById("EditEmail").value;
  var FULLNAME = document.getElementById("EditFullName").value;
  var UPDATEBY = document.getElementById("UpdateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (ROLEID == "") {
    alert("Please select Role");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (USERNAME === "") {
    alert("Please input Username");
    return;
  }

  if (EMAIL === "") {
    alert("Please input Email");
    return;
  }

  if (FULLNAME === "") {
    alert("Please input Full Name");
    return;
  }

  if (PASSWORD !== CONFIRMPASSWORD) {
    alert("Password and Confirm Password not match");
    return;
  }

  $.ajax({
    type: "POST",
    url: "2030.UserUpdate.php?id=" + Math.random(),
    data: {
      UserID: USERID,
      RoleID: ROLEID,
      StatusID: STATUSID,
      Username: USERNAME,
      Password: PASSWORD,
      ConfirmPassword: CONFIRMPASSWORD,
      Email: EMAIL,
      FullName: FULLNAME,
      UpdateBy: UPDATEBY,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Update Success", ""));
          fetch_data();
          $("#editUser").modal("hide");
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

$(document).on("click", ".deleteUser", async function () {
  var USERID = $(this).attr("UserID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "2040.UserDelete.php?id=" + Math.random(),
      data: {
        UserID: USERID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert(data.replace("Delete Success", ""));
            fetch_data();
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
});

$(document).on("click", ".activeUser", async function () {
  var USERID = $(this).attr("UserID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "2050.UserActive.php?id=" + Math.random(),
      data: {
        UserID: USERID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert(data.replace("Activate Success", ""));
            fetch_data();
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
});

$(document).on("click", ".debugUser", async function () {
  var USERID = $(this).attr("UserID");
  alert("DEBUG INFO\n\rUserID : " + USERID);
});
