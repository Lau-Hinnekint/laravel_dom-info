<!DOCTYPE html>
<html lang="en">

<?php $title = "Index" ?>

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $title ?></title>

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>

    <header class="header">

        <nav class="header_nav">

            <img class="toggleMenu header_nav-logo" src="images/logo2.jpeg" alt="Logo de l'entreprise" />

            <ul class="menu header_nav-listContainer">
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Ordinateur de bureau</a></li>
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Ordinateur multimédia</a></li>
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Ordinateur gaming</a></li>
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Ordinateur portable</a></li>
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Périphérique</a></li>
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Ecran</a></li>
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Déstockage & Bon plans</a></li>
                <li class="header_nav-list"><a href="#" class="header_nav-listLink">Qui somme-nous ?</a></li>
            </ul>

            <div class="header_nav-cart"><i class="fa-solid fa-basket-shopping "></i></div>

        </nav>

        <section class="header_banner">
            <article class="header_banner-nameContainer">

                <!-- <img class="header_banner-nameLogo" src="images/logoFlip-rbg.png" alt="Nom de l'entreprise" /> -->
                <img class="header_banner-nameTitle" src="images/title-rbg.png" alt="Logo de l'entreprise" />
                <!-- <img class="header_banner-nameLogo" src="images/logo-rbg.png" alt="Nom de l'entreprise" /> -->

            </article>

            <article class="header_banner-sentenceContainer">

                <p class="header_banner-sentenceText">"Accéder à la technologie avec nos PC reconditionnés de qualité à des tarifs compétitifs"</p>

            </article>
        </section>

    </header>

    <section class="header_searchbar">

        <form class="header_searchbar-form">
            <input class="header_searchbar-input" type="text" placeholder="Barre de recherche">
            <button class="header_searchbar-submit" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

    </section>

    <main>

    @section ('body')
    content
    @show

    <section class="main_label">

        <article class="main_label-container">
            <img class="main_label-img" src="images/service-assistance.jpg" alt="">
            <div class="main_label-text">Assistance par téléphone tous les jours de 10h à 18h</div>
        </article>

        <article class="main_label-container">
            <img class="main_label-img" src="images/service-fastdelivery.jpg" alt="">
            <div class="main_label-text">Livré demain pour toute commande passé avant 15H.</div>
        </article>

        <article class="main_label-container">
            <img class="main_label-img" src="images/service-3xsansfrais.png" alt="">
            <div class="main_label-text">Payer en 3x sans frais</div>
        </article>

        <article class="main_label-container">
            <img class="main_label-img" src="images/service-safedelivery.jpg" alt="">
            <div class="main_label-text">Livraison sécurisé et protégé garantie</div>
        </article>

    </section>

    <section class="main_cgv">

        <ul class="main_cgv-container">
            <li class="main_cgv-list"><a href="#" class="main_cgv-link">Mentions légales</a></li>
            <li class="main_cgv-list"><a href="#" class="main_cgv-link">Conditions générales de vente</a></li>
            <li class="main_cgv-list"><a href="#" class="main_cgv-link">Contact</a></li>
        </ul>

    </section>

    </main>

    <footer class="footer">

        <ul class="footer_container">
            <li class="footer_container-list">
                <?php
                // if (isset($_SESSION['email'])) {
                //     print "<a href='logout.php' class='footer_container-lnk'>Se déconnecter</a>";
                // } else {
                //     print "<a href='login.php' class='footer_container-lnk'>Se connecter</a>";
                // }
                ?>
            </li>
            <li class="footer_container-list">
                <?php
                // if (isset($_SESSION['email'])) {
                //     print "<p class='footer_container-text'>Connecté en tant que : " . $_SESSION['email'] . "</p>";
                // } else {
                //     print "<p class='footer_container-text'>Vous n'êtes pas connecté. </p>";
                // }
                ?>
            </li>
            <li class="footer_container-list"><a href="#" class="footer_container-link">Espace client</a></li>

        </ul>

    </footer>

</body>

</html>