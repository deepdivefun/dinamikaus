fetch_data();

async function showButtonTestimonialsData() {
  fetch_data();
}

async function fetch_data() {
  $("#dataTable").DataTable().clear().destroy();

  var TESTIMONIALSTATUSID = document.getElementById(
    "FilterTestimonialStatusID"
  ).value;
  var FULLNAME = document.getElementById("FilterFullName").value;
  var GTOKEN = document.getElementById("GToken").value;

  $.ajax({
    type: "POST",
    url: "6020.TestimonialFetch.php?id=" + Math.random(),
    data: {
      TestimonialStatusID: TESTIMONIALSTATUSID,
      FullName: FULLNAME,
      GTOKEN: GTOKEN,
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

async function createTestimonial() {
  var TESTIMONIALSTATUSID = document.getElementById(
    "TestimonialStatusID"
  ).value;
  var FULLNAME = document.getElementById("FullName").value;
  var COMPANY = document.getElementById("Company").value;
  var TESTIMONIALRATING = document.getElementById("TestimonialRating").value;
  var TESTIMONIALDESCRIPTION = document.getElementById(
    "TestimonialDescription"
  ).value;
  var CREATEBY = document.getElementById("CreateBy").value;
  var GTOKEN = document.getElementById("GToken").value;

  if (TESTIMONIALSTATUSID == "") {
    alert("Please select Testimonial Status");
    return;
  }

  if (FULLNAME === "") {
    alert("Please input Full Name");
    return;
  }

  if (TESTIMONIALRATING == "") {
    alert("Please input Testimonial Rating");
    return;
  }

  if (TESTIMONIALDESCRIPTION === "") {
    alert("Please input Testimonial Description");
    return;
  }

  $.ajax({
    type: "POST",
    url: "6010.TestimonialCreate.php?id=" + Math.random(),
    data: {
      TestimonialStatusID: TESTIMONIALSTATUSID,
      FullName: FULLNAME,
      Company: COMPANY,
      TestimonialRating: TESTIMONIALRATING,
      TestimonialDescription: TESTIMONIALDESCRIPTION,
      GToken: GTOKEN,
      CreateBy: CREATEBY,
    },
    success: function (data) {
      try {
        data = data.trim();
        if (data.includes("SWD_OK")) {
          alert("Create Success");
        } else {
          alert(data);
        }
      } catch (err) {
        alert(err.message);
      }
      fetch_data();
      $("#addTestimonial").modal("hide");
      location.reload();
    },
    error: function () {
      alert("Error");
    },
  });
}

$(document).on("click", ".reviewTestimonial", function () {
  var TESTIMONIALID = $(this).attr("TestimonialID");
  var FULLNAME = $(this).attr("FullName");
  var COMPANY = $(this).attr("Company");
  var TESTIMONIALDESCRIPTION = $(this).attr("TestimonialDescription");

  $("#ReadTestimonialID").val(TESTIMONIALID);
  $("#ReadFullName").val(FULLNAME);
  $("#ReadCompany").val(COMPANY);
  $("#ReadTestimonialDescription").val(TESTIMONIALDESCRIPTION);

  $("#reviewTestimonial").modal("show");
});

$(document).on("click", ".approveTestimonial", function () {
  var TESTIMONIALID = $(this).attr("TestimonialID");

  let confirmApprove = prompt(
    "Please input 'APPROVE' to confirm approve this Testimonial",
    ""
  );

  if (confirmApprove !== "APPROVE") {
    alert("Approve Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "6060.TestimonialsApprove.php?id=" + Math.random(),
      data: {
        TestimonialID: TESTIMONIALID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Approve Success");
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

$(document).on("click", ".notApproveTestimonial", function () {
  var TESTIMONIALID = $(this).attr("TestimonialID");

  let confirmApprove = prompt(
    "Please input 'NOT APPROVE' to confirm not approve this Testimonial",
    ""
  );

  if (confirmApprove !== "NOT APPROVE") {
    alert("Not Approve Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "6070.TestimonialNotApprove.php?id=" + Math.random(),
      data: {
        TestimonialID: TESTIMONIALID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Not Approve Success");
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

$(document).on("click", ".reviewTestimonials", function () {
  var TESTIMONIALSID = $(this).attr("TestimonialsID");

  let confirmBackToReview = prompt(
    "Please input 'BACK TO REVIEW' to confirm review this Testimonials",
    ""
  );

  if (confirmBackToReview !== "BACK TO REVIEW") {
    alert("Delete Cancel");
    return;
  } else {
    $.ajax({
      type: "POST",
      url: "5070.TestimonialsReview.php?id=" + Math.random(),
      data: {
        TestimonialsID: TESTIMONIALSID,
      },
      success: function (data) {
        try {
          data = data.trim();
          if (data.includes("SWD_OK")) {
            alert("Back To Review Success");
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

$(document).on("click", ".debugTestimonial", function () {
  var TESTIMONIALID = $(this).attr("TestimonialID");
  alert("DEBUG INFO\n\rTestimonialID : " + TESTIMONIALID);
});
