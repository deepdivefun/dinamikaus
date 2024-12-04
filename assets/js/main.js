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

// Sidebar Menu
const menuButton = document.getElementById("menuButton");
const menu = document.getElementById("menu");

menuButton.addEventListener("click", function () {
  if (menu.classList.contains("show")) {
    menu.classList.remove("show");
    closeIcon.style.display = "none";
    openIcon.style.display = "inline";
    document.body.classList.remove("menu-open");
  } else {
    menu.classList.add("show");
    openIcon.style.display = "none";
    closeIcon.style.display = "inline";
    document.body.classList.add("menu-open");
  }
});

function toggleMenu() {
  const dropdown = document.getElementById("dropdown-content-sidebar");
  if (dropdown.style.display === "block") {
    dropdown.style.display = "none";
  } else {
    dropdown.style.display = "block";
  }
}
