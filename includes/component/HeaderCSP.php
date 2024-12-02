<?php
header("Content-Security-Policy: style-src-elem 'self' https://www.google.com/ https://fonts.googleapis.com/ https://fonts.gstatic.com https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css https://unpkg.com/aos@2.3.1/dist/aos.css https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css 'unsafe-inline';" .
    "script-src 'self' https://www.google.com/ https://www.google.com/recaptcha/ https://www.gstatic.com/recaptcha/ https://www.googletagmanager.com/ https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js https://unpkg.com/aos@2.3.1/dist/aos.js https://cdn.tailwindcss.com 'unsafe-inline';" .
    "frame-ancestors 'self' https://www.google.com/ ;");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
