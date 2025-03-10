<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <?php foreach ($Meta->fetchMeta() as $row) : ?>
        <meta name="<?= $row['Name']; ?>" content="<?= $row['Content']; ?>">
    <?php endforeach; ?>

    <title>PT. Dinamika Utama Saka - <?= $Title; ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= WebRootPath(); ?>assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= WebRootPath(); ?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/x-icon" href="<?= WebRootPath(); ?>assets/img/favicon/favicon.ico">

    <link rel="preconnect" href="https://www.google.com" />
    <link rel="preconnect" href="https://www.gstatic.com" crossorigin />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TTRPTK9Q');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WWFPM51MDH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-WWFPM51MDH');
    </script>

    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />

    <!-- Google Recaptcha V3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Lco2AAjAAAAADY72bwy6ijVK9JYWkr_c6TmfRGC"></script>

    <!-- SWIPPER -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css" integrity="sha512-rd0qOHVMOcez6pLWPVFIv7EfSdGKLt+eafXh4RO/12Fgr41hDQxfGvoi1Vy55QIVcQEujUE1LQrATCLl2Fs+ag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AOS -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS files -->
    <link rel="stylesheet" href="<?= WebRootPath(); ?>assets/css/style.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTRPTK9Q"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->