@extends ('page')

@section ('body')

<section class="productList">

    <article class="cardFilter">

        <div class="cardFilter__container">
            <form action="{{ route('productList') }}" method="GET" class="cardFilter__form">

                @if (!is_null($brands) && count($brands) > 0)
                <label class="cardFilter__label" for="brand">Marque :</label>
                <select class="cardFilter__select" name="brand">
                    <option class="cardFilter__option"></option>
                    @foreach ($brands as $brand)
                    <option class="cardFilter__option">{{ $brand }}</option>
                    @endforeach
                </select>
                @endif

                @if (!is_null($procTypes) && count($procTypes) > 0)
                <label class="cardFilter__label" for="procType">Type de processeur :</label>
                <select class="cardFilter__select" name="procType">
                    <option class="cardFilter__option"></option>
                    @foreach ($procTypes as $procType)
                    <option class="cardFilter__option">{{ $procType }}</option>
                    @endforeach
                </select>
                @endif

                @if (!is_null($procFrequencies) && count($procFrequencies) > 0)
                <label class="cardFilter__label" for="procFrequency">Fréquence de processeur :</label>
                <select class="cardFilter__select" name="procFrequency">
                    <option class="cardFilter__option"></option>
                    @foreach ($procFrequencies as $procFrequency)
                    <option class="cardFilter__option">{{ $procFrequency }}</label>
                    @endforeach
                </select>
                @endif

                @if (!is_null($memorySizes) && count($memorySizes) > 0)
                <label class="cardFilter__label" for="memorySize">Quantité de mémoire :</label>
                <select class="cardFilter__select" name="memorySize">
                    <option class="cardFilter__option"></option>
                    @foreach ($memorySizes as $memorySize)
                    <option class="cardFilter__option">{{ $memorySize }}</option>
                    @endforeach
                </select>
                @endif

                @if (!is_null($memoTypes) && count($memoTypes) > 0)
                <label class="cardFilter__label" for="memoType">Type de mémoire :</label>
                <select class="cardFilter__select" name="memoType">
                    <option class="cardFilter__option"></option>
                    @foreach ($memoTypes as $memoType)
                    <option class="cardFilter__option">{{ $memoType }}</option>
                    @endforeach
                </select>
                @endif

                @if (!is_null($storPrimaries) && count($storPrimaries) > 0)
                <label class="cardFilter__label" for="storPrimary">Capacité de stockage :</label>
                <select class="cardFilter__select" name="storPrimary">
                    <option class="cardFilter__option"></option>
                    @foreach ($storPrimaries as $storPrimary)
                    <option class="cardFilter__option">{{ $storPrimary }}</option>
                    @endforeach
                </select>
                @endif

                @if (!is_null($dispChipsets) && count($dispChipsets) > 0)
                <label class="cardFilter__label" for="dispChipset">Chipset graphique :</label>
                <select class="cardFilter__select" name="dispChipset">
                    <option class="cardFilter__option"></option>
                    @foreach ($dispChipsets as $dispChipset)
                    <option class="cardFilter__option">{{ $dispChipset }}</option>
                    @endforeach
                </select>
                @endif

                @if (!is_null($dispMemories) && count($dispMemories) > 0)
                <label class="cardFilter__label" for="dispMemory">Mémoire graphique :</label>
                <select class="cardFilter__select" name="dispMemory">
                    <option class="cardFilter__option"></option>
                    @foreach ($dispMemories as $dispMemory)
                    <option class="cardFilter__option">{{ $dispMemory }}</option>
                    @endforeach
                </select>
                @endif

                @if (!is_null($netwWireless) && count($netwWireless) > 0)
                <label class="cardFilter__label" for="netwWire">Wifi :</label>
                <select class="cardFilter__select" name="netwWire">
                    <option class="cardFilter__option"></option>
                    @foreach ($netwWireless as $netwWire)
                    <option class="cardFilter__option">{{ $netwWire }}</option>
                    @endforeach
                </select>
                @endif

                <input class="cardFilter__input" type="hidden" name="ID" value=" {{ $categoryID }} " />
                <input class="cardFilter__input button" type="submit" name="ACTION" value="FILTRER" />
            </form>
        </div>

    </article>


    <article class="cardList">

        @foreach ($products as $product)

        <div class="cardList__container">
            <img src="{{ $product->product_img }}" alt="" class="card__img" />
            <h4 class="cardList__name">{{ $product->product_name }}</h4>
            <p class="cardList__text">{{ $product->product_desc }}</p>
            <div class="cardList__box">
                <p class="cardList__price">{{ $product->product_price }} €</p>
                <button class="button cardList__button"><a href="{{ route('productView') }}?id={{ $product->id }}" class="cardList__link">Voir produit</a></button>
            </div>
        </div>

        @endforeach

    </article>

    <!-- <?= var_dump($_REQUEST) ?> -->

</section>

@endSection