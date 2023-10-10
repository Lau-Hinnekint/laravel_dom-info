@extends ('page')

@section ('body')

<?php $title = "Dom'Info - Liste de produit"; ?>

<section class="productList">

    <div class="menuFilter">
        <svg class="icon openFilter" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z" />
        </svg>

        <svg class="icon closeFilter is-hidden" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="m296-345-56-56 240-240 240 240-56 56-184-184-184 184Z" />
        </svg>
    </div>

    <article class="filter">

        <div class="filter__container">
            <form action="{{ route('productFilter') }}" method="POST" class="filter__form">
                @csrf
                <input class="filter__input" type="hidden" name="category_id" value="{{$categoryID}}" />
                @if (!is_null($brands) && count($brands) > 0)
                <h6 class="filter__title">Marque :</h6>
                @foreach ($brands as $brand)
                    <label class="filter__label" for="{{ $brand }}">{{ $brand }}
                        <input type="checkbox" class="filter__chkbox" name="brand[]" id="{{ $brand }}" value="{{$brand}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($procTypes) && count($procTypes) > 0)
                <h6 class="filter__title">Type de processeur :</h6>
                @foreach ($procTypes as $procType)
                    <label class="filter__label" for="{{ $procType }}">{{ $procType }}
                        <input type="checkbox" class="filter__chkbox" name="procType[]" id="{{ $procType }}" value="{{$procType}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($procFrequencies) && count($procFrequencies) > 0)
                <h6 class="filter__title">Fréquence de processeur :</h6>
                @foreach ($procFrequencies as $procFrequency)
                    <label class="filter__label" for="{{$procFrequency}}">{{ $procFrequency }}
                        <input type="checkbox" class="filter__chkbox" name="procFrequency[]" id="{{$procFrequency}}" value="{{$procFrequency}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($memoSizes) && count($memoSizes) > 0)
                <h6 class="filter__title">Quantité de mémoire :</h6>
                @foreach ($memoSizes as $memoSize)
                    <label class="filter__label" for="{{$memoSize}}">{{ $memoSize }}
                        <input type="checkbox" class="filter__chkbox" name="memoSize[]" id="{{$memoSize}}" value="{{$memoSize}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($memoTypes) && count($memoTypes) > 0)
                <h6 class="filter__title">Type de mémoire :</h6>
                @foreach ($memoTypes as $memoType)
                    <label class="filter__label" for="{{$memoType}}">{{ $memoType }}
                        <input type="checkbox" class="filter__chkbox" name="memoType[]" id="{{$memoType}}" value="{{$memoType}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($storPrimaries) && count($storPrimaries) > 0)
                <h6 class="filter__title">Capacité de stockage :</h6>
                @foreach ($storPrimaries as $storPrimary)
                    <label class="filter__label" for="{{$storPrimary}}">{{ $storPrimary }}
                        <input type="checkbox" class="filter__chkbox" name="storPrimary[]" id="{{$storPrimary}}" value="{{$storPrimary}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($dispChipsets) && count($dispChipsets) > 0)
                <h6 class="filter__title">Chipset graphique :</h6>
                @foreach ($dispChipsets as $dispChipset)
                    <label class="filter__label" for="{{$dispChipset}}">{{ $dispChipset }}
                        <input type="checkbox" class="filter__chkbox" name="dispChipset[]" id="dispChipset" value="{{$dispChipset}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($dispMemories) && count($dispMemories) > 0)
                <h6 class="filter__title">Mémoire graphique :</h6>
                @foreach ($dispMemories as $dispMemory)
                    <label class="filter__label" for="{{$dispMemory}}">{{ $dispMemory }}
                        <input type="checkbox" class="filter__chkbox" name="dispMemory[]" id="{{$dispMemory}}" value="{{$dispMemory}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif

                @if (!is_null($netwWireless) && count($netwWireless) > 0)
                <h6 class="filter__title">Wifi :</h6>
                @foreach ($netwWireless as $netwWire)
                    <label class="filter__label" for="{{$netwWire}}">{{ $netwWire }}
                        <input type="checkbox" class="filter__chkbox" name="netwWire[]" id="{{$netwWire}}" value="{{$netwWire}}"></input>
                        <span class="filter__chkmark"></span>
                    </label>
                @endforeach
                @endif
                <input class="filter__input neon" type="submit" name="ACTION" value="FILTRER" />
            </form>
        </div>

    </article>


    <article class="cardList">

        @foreach ($products as $product)

        <div class="cardList__container neon">
            <img src="{{ $product->product_img }}" alt="" class="cardList__img" />
            <h4 class="cardList__name">{{ $product->product_name }}</h4>
            <p class="cardList__text">{{ $product->product_desc }}</p>
            <p class="cardList__price"><strong>{{ $product->product_price }} €</strong></p>
            <div class="cardList__box">
                <button class="cardList__view neon">
                    <a href="{{ route('productDetail') }}?id={{ $product->id }}" class="cardList__link">Voir produit</a>
                </button>
            </div>
        </div>

        @endforeach

    </article>

</section>

@endSection