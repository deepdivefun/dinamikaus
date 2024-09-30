<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Dashboard | <?= $Title; ?></title>

    <link rel="icon" type="image/x-icon" href="<?= WebRootPath(); ?>assets/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= WebRootPath(); ?>assets/img/favicon/apple-touch-icon.png">

    <link rel="preconnect" href="https://www.google.com" />
    <link rel="preconnect" href="https://www.gstatic.com" crossorigin />

    <!-- Google Recaptcha V3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Lco2AAjAAAAADY72bwy6ijVK9JYWkr_c6TmfRGC"></script>

    <!-- CSS files -->
    <link href="<?= WebRootPath(); ?>assets/css/tabler.min.css" rel="stylesheet" media="print" onload="this.media='all'" />
    <link href="<?= WebRootPath(); ?>assets/css/tabler-flags.min.css" rel="stylesheet" media="print" onload="this.media='all'" />
    <link href="<?= WebRootPath(); ?>assets/css/tabler-payments.min.css" rel="stylesheet" media="print" onload="this.media='all'" />
    <link href="<?= WebRootPath(); ?>assets/css/tabler-vendors.min.css" rel="stylesheet" media="print" onload="this.media='all'" />
    <link href="<?= WebRootPath(); ?>assets/css/demo.min.css" rel="stylesheet" media="print" onload="this.media='all'" />
    <link href="<?= WebRootPath(); ?>assets/css/custom.min.css" rel="stylesheet" media="print" onload="this.media='all'" />

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" media="print" onload="this.media='all'" />
    <!-- Datatable -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/date-1.5.1/r-2.5.0/sb-1.6.0/sp-2.2.0/datatables.min.css" rel="stylesheet" media="print" onload="this.media='all'" />
</head>

<body>
    <script src="<?= WebRootPath(); ?>assets/js/demo-theme.min.js"></script>
    <div class="page">