    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- swipper js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Aos -->
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Swipper -->
    <script>
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
            spaceBetween: 25, // Jarak antar slide
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

    <!-- Cokkie Consent -->
    <script type="text/javascript" src="https://cookieconsent.popupsmart.com/src/js/popper.js"></script>
    <script>
        window.start.init({
            Palette: 'palette4',
            Mode: 'floating right',
            Theme: 'edgeless',
            ButtonText: 'Accept All',
            Message: 'We use cookies to enhance your browsing experience, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies.',
            Location: 'https://dinamikaus.com/',
            Time: '5',
        })
    </script>

    <!-- Main JS -->
    <script src="<?= WebRootPath(); ?>assets/js/main.js"></script>

    <!-- Google Recaptcha V3 -->
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("6Lco2AAjAAAAADY72bwy6ijVK9JYWkr_c6TmfRGC", {
                action: "submit"
            }).then(function(GToken) {
                document.getElementById("GToken").value = GToken;
            })
        });
    </script>