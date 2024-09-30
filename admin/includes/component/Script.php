<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Libs JS -->
<!-- <script src="<?= WebRootPath(); ?>assets/libs/apexcharts/dist/apexcharts.min.js" defer></script>
<script src="<?= WebRootPath(); ?>assets/libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
<script src="<?= WebRootPath(); ?>assets/libs/jsvectormap/dist/maps/world.js" defer></script>
<script src="<?= WebRootPath(); ?>assets/libs/jsvectormap/dist/maps/world-merc.js" defer></script> -->
<!-- Datatable -->
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/date-1.5.1/r-2.5.0/sb-1.6.0/sp-2.2.0/datatables.min.js"></script>

<!-- Tabler Core -->
<script src="<?= WebRootPath(); ?>assets/js/tabler.min.js" defer></script>
<!-- <script src="<?= WebRootPath(); ?>assets/js/demo.min.js" defer></script> -->

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