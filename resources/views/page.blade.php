<!DOCTYPE html>
<html lang="fr">

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
                <div class="toggleMenu__icon openBurger"><i class="fa-solid fa-bars fa-sm" style="color: #ffffff;"></i></div>
                <div class="toggleMenu__icon is-hidden closeBurger"><i class="fa-solid fa-xmark fa-sm" style="color: #ffffff;"></i></div>
            </div>

            <a href=" {{ route('productList') }}"> <div class="nav__logo logo"></div></a>

            <ul class="nav__menu">

                @foreach ($categories as $category)
                <li class="menu__list"><a href="{{ route('productList') }}?cat_id={{ $category->id }}" class="menu__link">{{ $category->category_name }}</a></li>
                @endforeach

            </ul>

            <div class="nav__cart icon"></div>

        </nav>

        <section class="banner">

            <div class="banner__logo"></div>
            <p class="banner__sentence">"Accéder à la technologie avec nos PC reconditionnés de qualité à des tarifs compétitifs"</p>

        </section>

        <section class="searchbar">

            <form action="{{ route('productFilter') }}" method="post" class="searchbar__form">
                @csrf
                <input class="searchbar__input" type="text" placeholder="Barre de recherche" name="searchValue">
                <button class="searchbar__submit" type="submit" name="ACTION" value="RECHERCHER">
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
            <li class="footer__list"><a href="{{ route('profile.edit') }}" class="footer__lnk">Mon compte</a></li>

            <li class="footer__list">
                @if (Auth::check())
                    <p class='footer__text'>Connecté en tant que : <strong>{{ Auth::user()->name }}</strong></p>
                @else
                    <p class='footer__text'>Vous n'êtes pas connecté. </p>
                @endif
            </li>
            
            <li class="footer__list">
                @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Se déconnecter') }}
                    </x-dropdown-link>
                </form>
                @else
                <a href="{{ route('login') }}" class="footer__lnk">Se connecter</a> / 
                <a href="{{ route('register') }}" class="footer__lnk">S'enregistrer</a>
                @endif
            </li>

        </ul>


    </footer>

</body>

</html>