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

        <nav class="nav">

            <div class="nav__toggleMenu">
                <div class="toggleMenu__icon open"><i class="fa-solid fa-bars fa-sm" style="color: #ffffff;"></i></div>
                <div class="toggleMenu__icon is-hidden close"><i class="fa-solid fa-xmark fa-sm" style="color: #ffffff;"></i></div>
            </div>

            <div class="nav__logo logo"></div>
            
            <ul class="nav__menu">
                <!-- <li class="menu__list"><a href="{{ route('productList') }}?type=bureau" class="menu__link">Ordinateur de bureau</a></li>
                <li class="menu__list"><a href="{{ route('productList') }}?type=multimédia" class="menu__link">Ordinateur multimédia</a></li>
                <li class="menu__list"><a href="{{ route('productList') }}?type=gaming" class="menu__link">Ordinateur gaming</a></li>
                <li class="menu__list"><a href="{{ route('productList') }}?type=portable" class="menu__link">Ordinateur portable</a></li>
                <li class="menu__list"><a href="{{ route('productList') }}?type=périph" class="menu__link">Périphérique</a></li>
                <li class="menu__list"><a href="{{ route('productList') }}?type=écran" class="menu__link">Ecran</a></li> -->
                @foreach ($categories as $category)
                <li class="menu__list"><a href="{{ route('productList') }}?cat_id={{ $category->id }}" class="menu__link">{{ $category->category_name }}</a></li>
                @endforeach
            </ul>
            <?php
                // var_dump($categories[0]->category_name);
                // exit;
            ?>

            <div class="nav__cart icon"></div>

        </nav>

        <section class="banner">

            <div class="banner__logo"></div>
            <p class="banner__sentence">"Accéder à la technologie avec nos PC reconditionnés de qualité à des tarifs compétitifs"</p>

        </section>

        <section class="searchbar">

            <form method="get" class="searchbar__form">
                <input class="searchbar__input" type="text" placeholder="Barre de recherche">
                <button class="searchbar__submit" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

        </section>

    </header>

    <main class="l-content">

        @section ('body')
        content
        @show

        <section class="label">

            <article class="label__pnl">
                <img class="label__img" src="../public/images/service-assistance.jpg" alt="">
                <div class="label__text">Assistance par téléphone tous les jours de 10h à 18h</div>
            </article>

            <article class="label__pnl">
                <img class="label__img" src="../public/images/service-fastdelivery.jpg" alt="">
                <div class="label__text">Livré demain pour toute commande passé avant 15H.</div>
            </article>

            <article class="label__pnl">
                <img class="label__img" src="../public/images/service-3xsansfrais.png" alt="">
                <div class="label__text">Payer en 3x sans frais</div>
            </article>

            <article class="label__pnl">
                <img class="label__img" src="../public/images/service-safedelivery.jpg" alt="">
                <div class="label__text">Livraison sécurisé et protégé garantie</div>
            </article>

        </section>

        <section class="cgv">
            <ul class="cgv__box">
                <li class="cgv__list"><a href="#" class="cgv__link">Mentions légales</a></li>
                <li class="cgv__list"><a href="#" class="cgv__link">Conditions générales de vente</a></li>
                <li class="cgv__list"><a href="#" class="cgv__link">Contact</a></li>
            </ul>
        </section>

    </main>

    <footer class="l-footer">

        <ul class="footer">
            <li class="footer__list">
                <p class='footer__text'>Connecté en tant que : ***</p>
                <?php
                // if (isset($_SESSION['email'])) {
                //     print "<p class='footer_box-text'>Connecté en tant que : " . $_SESSION['email'] . "</p>";
                // } else {
                //     print "<p class='footer_box-text'>Vous n'êtes pas connecté. </p>";
                // }
                ?>
            </li>
            <li class="footer__list"><a href="#" class="footer__lnk">Espace client</a></li>
            <li class="footer__list">
                <a href='#' class='footer__link'>Se déconnecter</a>
                <?php
                // if (isset($_SESSION['email'])) {
                //     print "<a href='logout.php' class='footer_box-lnk'>Se déconnecter</a>";
                // } else {
                //     print "<a href='login.php' class='footer_box-lnk'>Se connecter</a>";
                // }
                ?>
            </li>

        </ul>

    </footer>

</body>

</html>