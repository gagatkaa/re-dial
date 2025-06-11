<?php
$allowedPages = ['home', 'idea1', 'idea2', 'idea3', 'stories', 'challenge_CTA'];
$currentPage = in_array($_GET['page'] ?? '', $allowedPages) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600&family=Fraunces:opsz,wght@72..144,500..600&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght,SOFT@72..144,500..600,100&display=swap"
        rel="stylesheet">


    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cpath d='M63.762 18.352C55.095 8.165 44.409 3 32 3S8.904 8.165.238 18.352a1 1 0 0 0-.012 1.281l9 11a.997.997 0 0 0 .724.365.987.987 0 0 0 .757-.291l7-7A1 1 0 0 0 18 23v-6.307A43.21 43.21 0 0 1 32 14a43.21 43.21 0 0 1 14 2.693V23a1 1 0 0 0 .293.707l7 7A1 1 0 0 0 54 31l.05-.002a.997.997 0 0 0 .724-.365l9-11a1 1 0 0 0-.012-1.28zM32 34a10 10 0 1 0 10 10 10.011 10.011 0 0 0-10-10zm0 2a1 1 0 1 1-1 1 1 1 0 0 1 1-1zm-5.657 2.343a1 1 0 1 1 0 1.414 1 1 0 0 1 0-1.414zM25 45a1 1 0 1 1 1-1 1 1 0 0 1-1 1zm2.757 4.657a1 1 0 1 1 0-1.414 1 1 0 0 1 0 1.414zM32 52a1 1 0 1 1 1-1 1 1 0 0 1-1 1zm0-4a4 4 0 1 1 4-4 4.005 4.005 0 0 1-4 4zm5.657 1.657a1 1 0 1 1 0-1.414 1 1 0 0 1 0 1.414zm0-9.9a1 1 0 1 1 0-1.414 1 1 0 0 1 0 1.414zM40 44a1 1 0 1 1-1-1 1 1 0 0 1 1 1z' style='fill:%231b1b1e'/%3E%3Ccircle cx='32' cy='44' r='2' style='fill:%231b1b1e'/%3E%3Cpath d='M43 27.586V20.41a1 1 0 0 0-.748-.968 46.443 46.443 0 0 0-6.133-1.175A1 1 0 0 0 35 19.26V25a2.002 2.002 0 0 1-2 2h-2a2.002 2.002 0 0 1-2-2v-5.74a1 1 0 0 0-1.12-.993 46.443 46.443 0 0 0-6.132 1.176 1 1 0 0 0-.748.967v7.176L10.467 38.119A4.975 4.975 0 0 0 9 41.66V56a5.006 5.006 0 0 0 5 5h36a5.006 5.006 0 0 0 5-5V41.66a4.975 4.975 0 0 0-1.467-3.541zM32 56a12 12 0 1 1 12-12 12.014 12.014 0 0 1-12 12z' style='fill:%231b1b1e'/%3E%3C/svg%3E" />
    <title>ReDial</title>
</head>

<body>
    <header class="header">
        <h1 class="logo">
            <a class="logo__link" href="index.php?page=home">
                <span>ReDial</span>
                <svg height="30" width="30" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25.625 25.625" xml:space="preserve"
                    style="color: var(--middle-blue);">
                    <g>
                        <path style="fill: currentColor;" d="M22.079,17.835c-1.548-1.324-3.119-2.126-4.648-0.804l-0.913,0.799
      c-0.668,0.58-1.91,3.29-6.712-2.234C5.005,10.079,7.862,9.22,8.531,8.645l0.918-0.8c1.521-1.325,0.947-2.993-0.15-4.71l-0.662-1.04
      C7.535,0.382,6.335-0.743,4.81,0.58L3.986,1.3C3.312,1.791,1.428,3.387,0.971,6.419c-0.55,3.638,1.185,7.804,5.16,12.375
      c3.97,4.573,7.857,6.87,11.539,6.83c3.06-0.033,4.908-1.675,5.486-2.272l0.827-0.721c1.521-1.322,0.576-2.668-0.973-3.995
      L22.079,17.835z" />
                    </g>
                </svg>
            </a>
        </h1>
        <nav class="home__nav">
            <ul class="menu">
                <li class="menu__item">
                    <a class="menu__link <?= $currentPage === 'home' ? 'active' : '' ?>"
                        href="index.php?page=home">Home</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link <?= in_array($currentPage, ['idea1', 'idea2', 'idea3']) ? 'active' : '' ?>"
                        href="index.php?page=idea1">Ideas</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link <?= $currentPage === 'stories' ? 'active' : '' ?>"
                        href="index.php?page=stories">Stories</a>
                </li>
            </ul>
        </nav>
        <a class="CTA__button" href="index.php?page=challenge_CTA">Join the Challenge!</a>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer class="footer">
        <div class="footer__content">
            <p class="footer__text">Copyright © 2025 ReDial | All Rights Reserved</p>
            <ul class="socials">
                <li class="socials__item">
                    <a class="socials__link" aria-label="Facebook" href="https://www.facebook.com" target="_blank">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </li>
                <li class="socials__item">
                    <a class="socials__link" aria-label="Instagram" href="https://www.instagram.com" target="_blank">
                        <i class=" fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li class="socials__item">
                    <a class="socials__link" aria-label="Twitter" href="https://x.com/?lang=en" target="_blank">
                        <i class=" fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li class="socials__item">
                    <a class="socials__link" aria-label="Youtube" href="https://youtu.be/AfIOBLr1NDU?t=2"
                        target="_blank">
                        <i class=" fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li class="socials__item">
                    <a class="socials__link" aria-label="TikTok" href="https://www.tiktok.com/en/" target="_blank">
                        <i class=" fa-brands fa-tiktok"></i>
                    </a>
                </li>

            </ul>
        </div>
    </footer>
    <script src="js/script.js"></script>
    <script src="js/mic.js"></script>
    <script src="js/validate.js"></script>
</body>

</html>