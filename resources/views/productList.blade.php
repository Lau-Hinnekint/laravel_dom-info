@extends ('page')

@section ('body')

<section class="productList">


    <article class="cardFilter">
    <svg class= "icon closeFilter" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
        <path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z"/>
    </svg>

    <svg class= "icon openFilter" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
        <path d="m296-345-56-56 240-240 240 240-56 56-184-184-184 184Z"/>
    </svg>


        <div class="cardFilter__container">
            <form action="{{ route('productList') }}" method="GET" class="cardFilter__form">
            <input class="cardFilter__input" type="hidden" name="cat_id" value="{{$categoryID}}" />
                @if (!is_null($brands) && count($brands) > 0)
                    <h6 class="cardFilter__title">Marque :</h6>
                    @foreach ($brands as $brand)                    
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "brand" id="brand" value="{{$brand}}"></input>
                        <label class="cardFilter__label" for="brand">{{ $brand }}</label>
                    </div>
                    @endforeach
                @endif

                @if (!is_null($procTypes) && count($procTypes) > 0)
                    <h6 class="cardFilter__title">Type de processeur :</h6>
                    @foreach ($procTypes as $procType)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "brand" id="procType" value="{{$procType}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $procType }}</label>                
                    </div>
                    @endforeach
                @endif

                @if (!is_null($procFrequencies) && count($procFrequencies) > 0)
                    <h6 class="cardFilter__title">Fréquence de processeur :</h6>
                    @foreach ($procFrequencies as $procFrequency)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "procFrequency" id="procFrequency" value="{{$procFrequency}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $procFrequency }}</label>
                    </div>
                    @endforeach
                @endif

                @if (!is_null($memorySizes) && count($memorySizes) > 0)
                    <h6 class="cardFilter__title">Quantité de mémoire :</h6>
                    @foreach ($memorySizes as $memorySize)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "memorySize" id="memorySize" value="{{$memorySize}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $memorySize }}</label>   
                    </div>
                    @endforeach
                @endif

                @if (!is_null($memoTypes) && count($memoTypes) > 0)
                    <h6 class="cardFilter__title">Type de mémoire :</h6>
                    @foreach ($memoTypes as $memoType)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "memoType" id="memoType" value="{{$memoType}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $memoType }}</label>  
                    </div>
                    @endforeach
                @endif

                @if (!is_null($storPrimaries) && count($storPrimaries) > 0)
                    <h6 class="cardFilter__title">Capacité de stockage :</h6>
                    @foreach ($storPrimaries as $storPrimary)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "storPrimary" id="storPrimary" value="{{$storPrimary}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $storPrimary }}</label>  
                    </div>
                    @endforeach
                @endif

                @if (!is_null($dispChipsets) && count($dispChipsets) > 0)
                    <h6 class="cardFilter__title">Chipset graphique :</h6>
                    @foreach ($dispChipsets as $dispChipset)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "dispChipset" id="dispChipset" value="{{$dispChipset}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $dispChipset }}</label>  
                    </div>
                    @endforeach
                @endif

                @if (!is_null($dispMemories) && count($dispMemories) > 0)
                    <h6 class="cardFilter__title">Mémoire graphique :</h6>
                    @foreach ($dispMemories as $dispMemory)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "dispMemory" id="dispMemory" value="{{$dispMemory}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $dispMemory }}</label>  
                    </div>
                    @endforeach
                @endif

                @if (!is_null($netwWireless) && count($netwWireless) > 0)
                    <h6 class="cardFilter__title">Wifi :</h6>
                    @foreach ($netwWireless as $netwWire)
                    <div class="cardFilter__feature">
                        <input type="checkbox" class="cardFilter__chkbox" name= "netwWire" id="netwWire" value="{{$netwWire}}"></input>
                        <label class="cardFilter__label" for="procType">{{ $netwWire }}</label>  
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