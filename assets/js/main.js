function mouseOver() {
  document.getElementById("dropdown-content").style.display = "block";
  document.getElementById("dropdown-content").style.width = "100vw - 10px";
}

function mouseOut() {
  document.getElementById("dropdown-content").style.display = "none";
}

AOS.init({
  duration: 1000,
});

const modal = document.getElementById("myModal");
const openModalButton = document.getElementById("openModal");
const closeModalButton = document.getElementById("closeModal");

openModalButton.addEventListener("click", () => {
  modal.style.display = "flex";
});

closeModalButton.addEventListener("click", () => {
  modal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});
