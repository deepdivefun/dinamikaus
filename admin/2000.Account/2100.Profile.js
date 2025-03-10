async function updateUserByID() {
  var USERID = document.getElementById("UserID").value;
  var USERNAME = document.getElementById("Username").value;
  var PASSWORD = document.getElementById("Password").value;
  var CONFIRMPASSWORD = document.getElementById("ConfirmPassword").value;
  var EMAIL = document.getElementById("Email").value;
  var FULLNAME = document.getElementById("FullName").value;
  var UPDATEBY = document.getElementById("UpdateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (EMAIL === "") {
    alert("Please input Email");
    return;
  }

  if (FULLNAME === "") {
    alert("Please input Full Name");
    return;
  }

  if (PASSWORD != CONFIRMPASSWORD) {
    alert("Password and Confirm Password not match");
    return;
  }

  $.ajax({
    type: "POST",
    url: "2130.ProfileUpdate.php?id=" + Math.random(),
    data: {
      UserID: USERID,
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
