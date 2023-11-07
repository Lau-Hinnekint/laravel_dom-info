@extends ('page')

@section ('body')

<?php $title = "Dom'Info - Résultat"; ?>

<section class="productFilter">
    <?php
    // var_dump($resultats);
    ?>

    <div class="pagination">
        <ul class="pagination__container">
            {{$resultats->links("pagination::default")}}
        </ul>
    </div>

    <article class="cardFiltered">

        @foreach ($resultats as $resultat)
        <div class="cardList__container neon">
            <img src="{{ $resultat->product_img }}" alt="" class="card__img" />
            <h4 class="cardList__name">{{ $resultat->product_name }}</h4>
            <p class="cardList__text">{{ $resultat->product_desc }}</p>
            <p class="cardList__price"><strong>{{ $resultat->product_price }} €</strong></p>
            <div class="cardList__box">
                <button class="cardList__view button">
                    <a href="{{ route('productDetail') }}?id={{ $resultat->id }}" class="cardList__link">Voir produit</a>
                </button>
            </div>
        </div>
        @endforeach

    </article>

</section>

@endSection