<!DOCTYPE html>
<html lang="en">

<?php $title = "Index" ?>

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $title ?></title>

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    @vite(['resources/css/style.scss', 'resources/js/app.js'])

</head>

<body>

    <header class="l-header">

        <nav class="flex flex-between">

            <div class="flex toggleMenu">
                <div class="open menu__icon"><i class="fa-solid fa-bars fa-sm" style="color: #ffffff;"></i></div>
                <div class="close menu__icon is-hidden"><i class="fa-solid fa-xmark fa-sm" style="color: #ffffff;"></i></div>
            </div>

            <div class="logo nav__logo"></div>

            <ul class="nav__menu">
                <li class="list menu__list"><a href="#" class="link menu__link">Ordinateur de bureau</a></li>
                <li class="list menu__list"><a href="#" class="link menu__link">Ordinateur multimédia</a></li>
                <li class="list menu__list"><a href="#" class="link menu__link">Ordinateur gaming</a></li>
                <li class="list menu__list"><a href="#" class="link menu__link">Ordinateur portable</a></li>
                <li class="list menu__list"><a href="#" class="link menu__link">Périphérique</a></li>
                <li class="list menu__list"><a href="#" class="link menu__link">Ecran</a></li>
                <li class="list menu__list"><a href="#" class="link menu__link">Déstockage & Bon plans</a></li>
                <li class="list menu__list"><a href="#" class="link menu__link">Qui somme-nous ?</a></li>
            </ul>

            <div class="icon nav__cart"></div>

        </nav>

        <section class="banner">

            <div class="banner__logo"></div>
            <p class="banner__sentence">"Accéder à la technologie avec nos PC reconditionnés de qualité à des tarifs compétitifs"</p>

        </section>

        <section class="flex flex-column">

            <form class="flex searchbar">
                <input class="searchbar__input" type="text" placeholder="Barre de recherche">
                <button class="searchbar__submit" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>            

        </section>

    </header>

    <main class="l-content">

    </main>

    <footer class="l-footer">

    </footer>

</body>

</html>