@extends ('page')

@section ('body')

<?php $title= "Dom'Info - Liste de produit"; ?>

<section class="productList">

    <div class="menuFilter">
        <svg class="icon openFilter" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z" />
        </svg>

        <svg class="icon closeFilter is-hidden" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="m296-345-56-56 240-240 240 240-56 56-184-184-184 184Z" />
        </svg>
    </div>

    <article class="cardFilter">

        <div class="cardFilter__container">
            <form action="{{ route('productFilter') }}" method="POST" class="cardFilter__form">
                @csrf
                <input class="cardFilter__input" type="hidden" name="cat_id" value="{{$categoryID}}" />
                @if (!is_null($brands) && count($brands) > 0)
                <h6 class="cardFilter__title">Marque :</h6>
                @foreach ($brands as $brand)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="brand[]" id="{{ $brand }}" value="{{$brand}}"></input>
                    <label class="cardFilter__label" for="{{ $brand }}">{{ $brand }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($procTypes) && count($procTypes) > 0)
                <h6 class="cardFilter__title">Type de processeur :</h6>
                @foreach ($procTypes as $procType)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="procType[]" id="{{ $procType }}" value="{{$procType}}"></input>
                    <label class="cardFilter__label" for="{{ $procType }}">{{ $procType }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($procFrequencies) && count($procFrequencies) > 0)
                <h6 class="cardFilter__title">Fréquence de processeur :</h6>
                @foreach ($procFrequencies as $procFrequency)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="procFrequency[]" id="{{$procFrequency}}" value="{{$procFrequency}}"></input>
                    <label class="cardFilter__label" for="{{$procFrequency}}">{{ $procFrequency }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($memoSizes) && count($memoSizes) > 0)
                <h6 class="cardFilter__title">Quantité de mémoire :</h6>
                @foreach ($memoSizes as $memoSize)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="memoSize[]" id="{{$memoSize}}" value="{{$memoSize}}"></input>
                    <label class="cardFilter__label" for="{{$memoSize}}">{{ $memoSize }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($memoTypes) && count($memoTypes) > 0)
                <h6 class="cardFilter__title">Type de mémoire :</h6>
                @foreach ($memoTypes as $memoType)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="memoType[]" id="{{$memoType}}" value="{{$memoType}}"></input>
                    <label class="cardFilter__label" for="{{$memoType}}">{{ $memoType }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($storPrimaries) && count($storPrimaries) > 0)
                <h6 class="cardFilter__title">Capacité de stockage :</h6>
                @foreach ($storPrimaries as $storPrimary)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="storPrimary[]" id="{{$storPrimary}}" value="{{$storPrimary}}"></input>
                    <label class="cardFilter__label" for="{{$storPrimary}}">{{ $storPrimary }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($dispChipsets) && count($dispChipsets) > 0)
                <h6 class="cardFilter__title">Chipset graphique :</h6>
                @foreach ($dispChipsets as $dispChipset)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="dispChipset[]" id="dispChipset" value="{{$dispChipset}}"></input>
                    <label class="cardFilter__label" for="{{$dispChipset}}">{{ $dispChipset }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($dispMemories) && count($dispMemories) > 0)
                <h6 class="cardFilter__title">Mémoire graphique :</h6>
                @foreach ($dispMemories as $dispMemory)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="dispMemory[]" id="{{$dispMemory}}" value="{{$dispMemory}}"></input>
                    <label class="cardFilter__label" for="{{$dispMemory}}">{{ $dispMemory }}</label>
                </div>
                @endforeach
                @endif

                @if (!is_null($netwWireless) && count($netwWireless) > 0)
                <h6 class="cardFilter__title">Wifi :</h6>
                @foreach ($netwWireless as $netwWire)
                <div class="cardFilter__feature">
                    <input type="checkbox" class="cardFilter__chkbox" name="netwWire[]" id="{{$netwWire}}" value="{{$netwWire}}"></input>
                    <label class="cardFilter__label" for="{{$netwWire}}">{{ $netwWire }}</label>
                </div>
                @endforeach
                @endif
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
            <p class="cardList__price"><strong>{{ $product->product_price }} €</strong></p>
            <div class="cardList__box">
                <button class="cardList__view button">
                    <a href="{{ route('productDetail') }}?id={{ $product->id }}" class="cardList__link">Voir produit</a>
                </button>
            </div>
        </div>

        @endforeach

    </article>

</section>

@endSection