      <div style="position: absolute; z-index: 11; " id="menu" class="menu">
          <div class="menu-content bg-white">
              <ul class="mx-6 my-6 gap-6 grid">
                  <li class="flex justify-between"><a href="<?= WebRootPath(); ?>index">Home</a> <span><i class="fa-solid fa-chevron-right"></i></span></li>
                  <li class="flex justify-between">
                      <button onclick="toggleMenu()">
                          Product
                      </button>
                      <span> <i class="fa-solid fa-chevron-right"></i></span>
                  </li>

                  <div class="dropdown-content-sidebar" id="dropdown-content-sidebar">
                      <div class="bg-black">
                          <?php foreach ($Product->fetchProductNavbar() as $row) : ?>
                              <div class='grid justify-items-center text-white p-3 text-center'>
                                  <a href="<?= WebRootPath(); ?>products/<?= Encryptor('encrypt', $row['ProductCategoryID']); ?>">
                                      <img class='w-32 h-32' src="<?= WebRootPath(); ?>admin/assets/img/productcategoryphoto/<?= $row['ProductCategoryPhoto']; ?>" alt="<?= $row['ProductCategoryPhoto']; ?>">
                                      <p class="text-sm mt-5"><?= $row['ProductCategoryName']; ?></p>
                                  </a>
                              </div>
                          <?php endforeach; ?>
                      </div>
                  </div>
                  <li class="flex justify-between"><a href="<?= WebRootPath(); ?>about">About</a> <span> <i class="fa-solid fa-chevron-right"></i></span> </li>
                  <li class="flex justify-between"><a href="<?= WebRootPath(); ?>contact">Contact</a> <span> <i class="fa-solid fa-chevron-right"></i></span> </li>
              </ul>
          </div>
      </div>

      <!-- <style>
          .menu {
              position: fixed;
              left: -100%;
              height: 100%;
              width: 100%;
              background-color: white;
              overflow-x: hidden;
              transition: left 0.3s ease;
              z-index: 1000;
          }

          .menu.show {
              left: 0;
          }

          body.menu-open {
              height: 100vh;
              overflow: hidden;
          }

          .icon-button {
              background: none;
              border: none;
              cursor: pointer;
              font-size: 24px;
              /* Adjust base size */
              transition: transform 0.3s ease;
              /* Transition effect */
          }

          .fa-bars,
          .fa-x {
              transition: opacity 0.3s ease;
              /* Transition for icons */
          }

          .dropdown-content-sidebar {
              display: none;
              background-color: white;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              z-index: 15;
              /* On top */
          }
      </style> -->

      <!-- <script>
          const menuButton = document.getElementById("menuButton");
          const menu = document.getElementById("menu");

          menuButton.addEventListener("click", function() {
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
      </script> -->