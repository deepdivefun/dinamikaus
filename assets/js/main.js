function mouseOver() {
  document.getElementById("dropdown-content").style.display = "block";
  document.getElementById("dropdown-content").style.width = "100vw - 10px";
}

function mouseOut() {
  document.getElementById("dropdown-content").style.display = "none";
}

// Initialize AOS
AOS.init({
  duration: 1000, // Duration of the animation (in ms)
  // once: true, // Trigger animation only once
});
