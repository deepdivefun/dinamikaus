fetch_data();

async function showButtonMessageData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSMESSAGEID = document.getElementById("FilterStatusMessageID").value;
  var FULLNAME = document.getElementById("FilterFullName").value;
  var EMAIL = document.getElementById("FilterEmail").value;
  var COMPANYNAME = document.getElementById("FilterCompanyName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "6020.MessageFetch.php?id=" + Math.random(),
    data: {
      StatusMessageID: STATUSMESSAGEID,
      FullName: FULLNAME,
      Email: EMAIL,
      CompanyName: COMPANYNAME,
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

$(document).on("click", ".editMessage", function () {
  var MESSAGEID = $(this).attr("MessageID");
  var STATUSMESSAGEID = $(this).attr("StatusMessageID");
  var FULLNAME = $(this).attr("FullName");
  var EMAIL = $(this).attr("Email");
  var COMPANYNAME = $(this).attr("CompanyName");
  var PHONENUMBER = $(this).attr("PhoneNumber");
  var WHATSAPPNUMBER = $(this).attr("WhatsappNumber");
  var MESSAGESUBJECT = $(this).attr("MessageSubject");
  var MESSAGECONTENTS = $(this).attr("MessageContents");
  var CREATETIME = $(this).attr("CreateTime");

  document.getElementById("MessageID").value = MESSAGEID;
  document.getElementById("StatusMessageID").value = STATUSMESSAGEID;
  document.getElementById("FullName").value = FULLNAME;
  document.getElementById("Email").value = EMAIL;
  document.getElementById("CompanyName").value = COMPANYNAME;
  document.getElementById("PhoneNumber").value = PHONENUMBER;
  document.getElementById("WhatsappNumber").value = WHATSAPPNUMBER;
  document.getElementById("MessageSubject").value = MESSAGESUBJECT;
  document.getElementById("MessageContents").value = MESSAGECONTENTS;
  document.getElementById("CreateTime").value = CREATETIME;

  $("#editMessage").modal("show");
});

async function updateMessage() {
  var MESSAGEID = document.getElementById("MessageID").value;
  var STATUSMESSAGEID = document.getElementById("StatusMessageID").value;
  var GTOKEN = document.getElementById("GToken").value;
  var UpdateBy = document.getElementById("UpdateBy").value;

  if (STATUSMESSAGEID == "") {
    alert("Please select status message");
    return;
  }

  $.ajax({
    type: "POST",
    url: "6030.MessageUpdate.php?id=" + Math.random(),
    data: {
      MessageID: MESSAGEID,
      StatusMessageID: STATUSMESSAGEID,
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
      $("#editMessage").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".sendEmail", function () {
  var EMAIL = $(this).attr("Email");
  window.open("mailto:" + EMAIL, "_blank");
});

$(document).on("click", ".callPhoneNumber", function () {
  var PHONENUMBER = $(this).attr("PhoneNumber");
  window.open("tel:" + PHONENUMBER, "_blank");
});

$(document).on("click", ".sendWhatsapp", function () {
  var WHATSAPPNUMBER = $(this).attr("WhatsappNumber");
  window.open("https://wa.me/" + WHATSAPPNUMBER, "_blank");
});

$(document).on("click", ".debugMessage", function () {
  var MESSAGEID = $(this).attr("MessageID");
  alert("DEBUG INFO\n\rMessageID : " + MESSAGEID);
});
