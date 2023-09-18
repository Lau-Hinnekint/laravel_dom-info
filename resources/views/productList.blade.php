@extends ('page')

@section ('body')

<section class="product">
    @foreach ($products as $product)

    <article class="card__container">
            <img src="{{ $product->image }}" alt="" class="card__img" />
            <h4 class="card__name">{{ $product->name }}</h4>
            <p class="card__text">{{ $product->description }}</p>
        <div class="card__box">
            <p class="card__price">{{ $product->price }} €</p>
            <button class="button card__button"><a href="#" class="card__link">Voir produit</a></button>
        </div>
    </article>

    @endforeach
</section>

@endSection