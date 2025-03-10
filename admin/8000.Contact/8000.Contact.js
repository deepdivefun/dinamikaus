fetch_data();

async function showButtonContacttData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var STATUSID = document.getElementById("FilterStatusID").value;
  var CONTACTNAMEAREA = document.getElementById("FilterContactNameArea").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "8020.ContactFetch.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ContactNameArea: CONTACTNAMEAREA,
      GTOKEN: GTOKEN,
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

async function createContact() {
  var STATUSID = document.getElementById("StatusID").value;
  var CONTACTNAMEAREA = document.getElementById("ContactNameArea").value;
  var CONTACTADDRESS = document.getElementById("ContactAddress").value;
  var CONTACTLINKGMAPS = document.getElementById("ContactLinkGmaps").value;
  var CONTACTNUMBER = document.getElementById("ContactNumber").value;
  var CONTACTEMAIL = document.getElementById("ContactEmail").value;
  var CONTACTEMAILALTERNATIVE = document.getElementById(
    "ContactEmailAlternative"
  ).value;
  var CREATEBY = document.getElementById("CreateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (CONTACTNAMEAREA === "") {
    alert("Please input Name Area");
    return;
  }

  if (CONTACTEMAIL === "") {
    alert("Please input Contact Email");
    return;
  }

  $.ajax({
    type: "POST",
    url: "8010.ContactCreate.php?id=" + Math.random(),
    data: {
      StatusID: STATUSID,
      ContactNameArea: CONTACTNAMEAREA,
      ContactAddress: CONTACTADDRESS,
      ContactLinkGmaps: CONTACTLINKGMAPS,
      ContactNumber: CONTACTNUMBER,
      ContactEmail: CONTACTEMAIL,
      ContactEmailAlternative: CONTACTEMAILALTERNATIVE,
      CreateBy: CREATEBY,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Create Success", ""));
          fetch_data();
          $("#addContact").modal("hide");
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

$(document).on("click", ".editContact", async function () {
  var CONTACTID = $(this).attr("ContactID");
  var STATUSID = $(this).attr("StatusID");
  var CONTACTNAMEAREA = $(this).attr("ContactNameArea");
  var CONTACTADRESS = $(this).attr("ContactAddress");
  var CONTACTLINKGMAPS = $(this).attr("ContactLinkGmaps");
  var CONTACTNUMBER = $(this).attr("ContactNumber");
  var CONTACTEMAIL = $(this).attr("ContactEmail");
  var CONTACTEMAILALTERNATIVE = $(this).attr("ContactEmailAlternative");

  $("#EditContactID").val(CONTACTID);
  $("#EditStatusID").val(STATUSID);
  $("#EditContactNameArea").val(CONTACTNAMEAREA);
  $("#EditContactAddress").val(CONTACTADRESS);
  $("#EditContactLinkGmaps").val(CONTACTLINKGMAPS);
  $("#EditContactNumber").val(CONTACTNUMBER);
  $("#EditContactEmail").val(CONTACTEMAIL);
  $("#EditContactEmailAlternative").val(CONTACTEMAILALTERNATIVE);

  $("#editContact").modal("show");
});

async function updateContact() {
  var CONTACTID = document.getElementById("EditContactID").value;
  var STATUSID = document.getElementById("EditStatusID").value;
  var CONTACTNAMEAREA = document.getElementById("EditContactNameArea").value;
  var CONTACTADDRESS = document.getElementById("EditContactAddress").value;
  var CONTACTLINKGMAPS = document.getElementById("EditContactLinkGmaps").value;
  var CONTACTNUMBER = document.getElementById("EditContactNumber").value;
  var CONTACTEMAIL = document.getElementById("EditContactEmail").value;
  var CONTACTEMAILALTERNATIVE = document.getElementById(
    "EditContactEmailAlternative"
  ).value;
  var UPDATEBY = document.getElementById("UpdateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (CONTACTID == "") {
    alert("ContactID Undefined");
    return;
  }

  if (STATUSID == "") {
    alert("Please select Status");
    return;
  }

  if (CONTACTNAMEAREA === "") {
    alert("Please input Name Area");
    return;
  }

  if (CONTACTEMAIL === "") {
    alert("Please input Contact Email");
    return;
  }

  $.ajax({
    type: "POST",
    url: "8030.ContactUpdate.php?id=" + Math.random(),
    data: {
      ContactID: CONTACTID,
      StatusID: STATUSID,
      ContactNameArea: CONTACTNAMEAREA,
      ContactAddress: CONTACTADDRESS,
      ContactLinkGmaps: CONTACTLINKGMAPS,
      ContactNumber: CONTACTNUMBER,
      ContactEmail: CONTACTEMAIL,
      ContactEmailAlternative: CONTACTEMAILALTERNATIVE,
      UpdateBy: UPDATEBY,
      GToken: GTOKEN,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert(data.replace("Update Success", ""));
          fetch_data();
          $("#editContact").modal("hide");
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

$(document).on("click", ".deleteContact", async function () {
  var CONTACTID = $(this).attr("ContactID");

  let confirmDelete = prompt("Please input 'DELETE' to confirm delete", "");

  if (confirmDelete !== "DELETE") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "8040.ContactDelete.php?id=" + Math.random(),
      data: {
        ContactID: CONTACTID,
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

$(document).on("click", ".activeContact", async function () {
  var CONTACTID = $(this).attr("ContactID");

  let confirmActive = prompt("Please input 'ACTIVE' to confirm active", "");

  if (confirmActive !== "ACTIVE") {
    alert("Active Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "8050.ContactActive.php?id=" + Math.random(),
      data: {
        ContactID: CONTACTID,
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

$(document).on("click", ".debugContact", async function () {
  var CONTACTID = $(this).attr("ContactID");
  alert("DEBUG INFO\n\rContactID : " + CONTACTID);
});
