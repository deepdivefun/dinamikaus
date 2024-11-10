function mouseOver() {
  document.getElementById("dropdown-content").style.display = "block";
  document.getElementById("dropdown-content").style.width = "100vw - 10px";
}

function mouseOut() {
  document.getElementById("dropdown-content").style.display = "none";
}

AOS.init({
  duration: 1000,
  // once: true,
});
