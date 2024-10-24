function mouseOver() {
  document.getElementById("dropdown-content").style.display = "block";
}

function mouseOut() {
  document.getElementById("dropdown-content").style.display = "none";
}

// Slider
document.addEventListener("DOMContentLoaded", function () {
  const slider = document.getElementById("slider");
  const next = document.getElementById("next");
  const prev = document.getElementById("prev");

  next.addEventListener("click", () => {
    slider.scrollBy({ left: 100, behavior: "smooth" });
  });

  prev.addEventListener("click", () => {
    slider.scrollBy({ left: -100, behavior: "smooth" });
  });
});
