@extends ('page')

@section ('body')

<section class="productList">
    @foreach ($products as $product)

    <article class="cardList__container">
            <img src="{{ $product->product_img }}" alt="" class="card__img" />
            <h4 class="cardList__name">{{ $product->product_name }}</h4>
            <p class="cardList__text">{{ $product->product_desc }}</p>
        <div class="cardList__box">
            <p class="cardList__price">{{ $product->product_price }} €</p>
            <button class="button cardList__button"><a href="{{ route('productView') }}?id={{ $product->id }}" class="cardList__link">Voir produit</a></button>
        </div>
    </article>

    @endforeach
</section>

@endSection