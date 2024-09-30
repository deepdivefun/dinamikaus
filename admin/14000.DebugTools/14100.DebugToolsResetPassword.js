async function resetPasswordTools() {
  var EMAIL = document.getElementById("Email").value;
  var CONFIRMEMAIL = document.getElementById("ConfirmEmail").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (EMAIL == "") {
    alert("Please enter your email address.");
    return;
  }

  if (CONFIRMEMAIL == "") {
    alert("Please confirm your email address.");
    return;
  }

  if (EMAIL != CONFIRMEMAIL) {
    alert("Email and Confirm Email do not match.");
    return;
  }

  $.ajax({
    type: "POST",
    url: "14110.DebugToolsResetPasswordSendEmail.php?id=" + Math.random(),
    data: {
      Email: EMAIL,
      ConfirmEmail: CONFIRMEMAIL,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert("Reset Success");
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
