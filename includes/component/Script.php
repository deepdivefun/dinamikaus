    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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