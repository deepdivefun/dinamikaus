<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <?php foreach ($Meta->fetchMeta() as $row) : ?>
        <meta name="<?= $row['Name']; ?>" content="<?= $row['Content']; ?>">
    <?php endforeach; ?>

    <title>PT. Dinamika Utama Saka - <?= $Title; ?></title>

    <link rel="icon" type="image/x-icon" href="<?= WebRootPath(); ?>assets/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= WebRootPath(); ?>assets/img/favicon/apple-touch-icon.png">

    <link rel="preconnect" href="https://www.google.com" />
    <link rel="preconnect" href="https://www.gstatic.com" crossorigin />

    <!-- Google Recaptcha V3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Lco2AAjAAAAADY72bwy6ijVK9JYWkr_c6TmfRGC"></script>

    <!-- SWIPPER -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS files -->
    <link href="<?= WebRootPath(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body>