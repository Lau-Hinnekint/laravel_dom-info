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

            <img class="toggleMenu header_nav-logo" src="images/logoWtitle-rbg.png" alt="Logo de l'entreprise" />

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

                <img class="header_banner-nameLogo" src="images/logoFlip-rbg.png" alt="Nom de l'entreprise" />
                <img class="header_banner-nameTitle" src="images/title-rbg.png" alt="Logo de l'entreprise" />
                <img class="header_banner-nameLogo" src="images/logo-rbg.png" alt="Nom de l'entreprise" />

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

</body>

</html>