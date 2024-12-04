<?php
header("Content-Security-Policy: style-src-elem 'self' https://www.google.com/ https://fonts.googleapis.com/ https://fonts.gstatic.com https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css https://cookieconsent.popupsmart.com/src/css/style.css 'unsafe-inline';" .
    "script-src 'self' https://www.google.com/ https://www.google.com/recaptcha/ https://www.gstatic.com/recaptcha/ https://www.googletagmanager.com/ https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js https://cdn.tailwindcss.com https://cookieconsent.popupsmart.com/src/js/popper.js 'unsafe-inline';" .
    "frame-ancestors 'self' https://www.google.com/ ;");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
