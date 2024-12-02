    <!-- swipper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Main JS -->
    <script src="<?= WebRootPath(); ?>assets/js/main.js"></script>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Google Recaptcha V3 -->
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("6Lco2AAjAAAAADY72bwy6ijVK9JYWkr_c6TmfRGC", {
                action: "submit"
            }).then(function(GToken) {
                document.getElementById("GToken").value = GToken;
            })
        });

        var swiper = new Swiper(".swipper", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            slidesPerView: 2,
            spaceBetween: 30,
            pagination: {
                // el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper2 = new Swiper(".swipper2", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            slidesPerView: 8,
            spaceBetween: 30,
            pagination: {
                // el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                // Pengaturan untuk layar di bawah 430px
                0: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 8,
                },
            },
        });

        var swiper3 = new Swiper(".swipper3", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            slidesPerView: 2,
            spaceBetween: 30,
            pagination: {
                // el: ".swiper-pagination",
                clickable: true,
            },
        });

        const swiper4 = new Swiper('.swiper4', {
            slidesPerView: 1,
            spaceBetween: 20, // Jarak antar slide
            loop: true, // Aktifkan looping
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>