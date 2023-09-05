@extends ('page')

@section ('body')

<section class="main_product">
    @foreach ($products as $product)

    <article class="product_card-container">
            <img src="{{ $product->image }}" alt="" class="product_card-img" />
            <h1 class="product_card-name">{{ $product->name }}</h1>
            <p class="product_card-description">{{ $product->description }}</p>
        <div class="product_card-box">
            <p class="product_card-price">{{ $product->price }} €</p>
            <button class="product_card-button"><a href="#" class="product_card-link">Voir produit</a></button>
        </div>
    </article>

    @endforeach
</section>

@endSection