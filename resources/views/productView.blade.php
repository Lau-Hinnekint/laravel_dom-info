@extends ('page')

@section ('body')

<section class="productView">
    <article class="cardView">
        <h4 class="cardView__name">{{ $productView[0]->product_name }}</h4>

        <img src="{{ $productView[0]->product_img }}" alt="" class="cardView__container cardView__img" />

        <div class="cardView__box">
            <p class="cardView__text">{{ $productView[0]->product_desc }}</p>
        </div>
        <div class="cardView__box">
            <p class="cardView__price">{{ $productView[0]->product_price }} €</p>
            <button class="button cardView__button"><a href="#" class="cardView__link">Ajouter au panier</a></button>
        </div>
    </article>

</section>

@endSection