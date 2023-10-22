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

                @if (!is_null($result['gene_brand']) && count($result['gene_brand']) > 0)
                <h6 class="filter__title">Marque :</h6>
                @foreach ($result['gene_brand'] as $brand)
                <label class="filter__label" for="{{ $brand }}">{{ $brand }}
                    <input type="checkbox" class="filter__chkbox" name="gene_brand[]" id="{{ $brand }}" value="{{$brand}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['proc_type']) && count($result['proc_type']) > 0)
                <h6 class="filter__title">Type de processeur :</h6>
                @foreach ($result['proc_type'] as $procType)
                <label class="filter__label" for="{{ $procType }}">{{ $procType }}
                    <input type="checkbox" class="filter__chkbox" name="proc_type[]" id="{{ $procType }}" value="{{$procType}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['proc_frequency']) && count($result['proc_frequency']) > 0)
                <h6 class="filter__title">Fréquence de processeur :</h6>
                @foreach ($result['proc_frequency'] as $procFrequency)
                <label class="filter__label" for="{{$procFrequency}}">{{ $procFrequency }}
                    <input type="checkbox" class="filter__chkbox" name="proc_frequency[]" id="{{$procFrequency}}" value="{{$procFrequency}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['memo_size']) && count($result['memo_size']) > 0)
                <h6 class="filter__title">Quantité de mémoire :</h6>
                @foreach ($result['memo_size'] as $memoSize)
                <label class="filter__label" for="{{$memoSize}}">{{ $memoSize }}
                    <input type="checkbox" class="filter__chkbox" name="memo_size[]" id="{{$memoSize}}" value="{{$memoSize}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['memo_type']) && count($result['memo_type']) > 0)
                <h6 class="filter__title">Type de mémoire :</h6>
                @foreach ($result['memo_type'] as $memoType)
                <label class="filter__label" for="{{$memoType}}">{{ $memoType }}
                    <input type="checkbox" class="filter__chkbox" name="memo_type[]" id="{{$memoType}}" value="{{$memoType}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['stor_primary']) && count($result['stor_primary']) > 0)
                <h6 class="filter__title">Capacité de stockage :</h6>
                @foreach ($result['stor_primary'] as $storPrimary)
                <label class="filter__label" for="{{$storPrimary}}">{{ $storPrimary }}
                    <input type="checkbox" class="filter__chkbox" name="stor_primary[]" id="{{$storPrimary}}" value="{{$storPrimary}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['disp_chipset']) && count($result['disp_chipset']) > 0)
                <h6 class="filter__title">Chipset graphique :</h6>
                @foreach ($result['disp_chipset'] as $dispChipset)
                <label class="filter__label" for="{{$dispChipset}}">{{ $dispChipset }}
                    <input type="checkbox" class="filter__chkbox" name="disp_chipset[]" id="dispChipset" value="{{$dispChipset}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['disp_memory']) && count($result['disp_memory']) > 0)
                <h6 class="filter__title">Mémoire graphique :</h6>
                @foreach ($result['disp_memory'] as $dispMemory)
                <label class="filter__label" for="{{$dispMemory}}">{{ $dispMemory }}
                    <input type="checkbox" class="filter__chkbox" name="disp_memory[]" id="{{$dispMemory}}" value="{{$dispMemory}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['netw_wireless']) && count($result['netw_wireless']) > 0)
                <h6 class="filter__title">Wifi :</h6>
                @foreach ($result['netw_wireless'] as $netwWire)
                <label class="filter__label" for="{{$netwWire}}">{{ $netwWire }}
                    <input type="checkbox" class="filter__chkbox" name="netw_wireless[]" id="{{$netwWire}}" value="{{$netwWire}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['peri_type']) && count($result['peri_type']) > 0)
                <h6 class="filter__title">Type de périphérique :</h6>
                @foreach ($result['peri_type'] as $periType)
                <label class="filter__label" for="{{$periType}}">{{ $periType }}
                    <input type="checkbox" class="filter__chkbox" name="peri_type[]" id="{{$periType}}" value="{{$periType}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['peri_lang']) && count($result['peri_lang']) > 0)
                <h6 class="filter__title">Langue du clavier :</h6>
                @foreach ($result['peri_lang'] as $periLang)
                <label class="filter__label" for="{{$periLang}}">{{ $periLang }}
                    <input type="checkbox" class="filter__chkbox" name="peri_lang[]" id="{{$periLang}}" value="{{$periLang}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['peri_connector']) && count($result['peri_connector']) > 0)
                <h6 class="filter__title">Connecteur :</h6>
                @foreach ($result['peri_connector'] as $periConnector)
                <label class="filter__label" for="{{$periConnector}}">{{ $periConnector }}
                    <input type="checkbox" class="filter__chkbox" name="peri_connector[]" id="{{$periConnector}}" value="{{$periConnector}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['scrn_type']) && count($result['scrn_type']) > 0)
                <h6 class="filter__title">Type de dalle :</h6>
                @foreach ($result['scrn_type'] as $scrnType)
                <label class="filter__label" for="{{$scrnType}}">{{ $scrnType }}
                    <input type="checkbox" class="filter__chkbox" name="scrn_type[]" id="{{$scrnType}}" value="{{$scrnType}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['scrn_size']) && count($result['scrn_size']) > 0)
                <h6 class="filter__title">Taille de l'écran :</h6>
                @foreach ($result['scrn_size'] as $scrnSize)
                <label class="filter__label" for="{{$scrnSize}}">{{ $scrnSize }}
                    <input type="checkbox" class="filter__chkbox" name="scrn_size[]" id="{{$scrnSize}}" value="{{$scrnSize}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['scrn_resolution']) && count($result['scrn_resolution']) > 0)
                <h6 class="filter__title">Résolution de l'écran :</h6>
                @foreach ($result['scrn_resolution'] as $scrnResolution)
                <label class="filter__label" for="{{$scrnResolution}}">{{ $scrnResolution }}
                    <input type="checkbox" class="filter__chkbox" name="scrn_resolution[]" id="{{$scrnResolution}}" value="{{$scrnResolution}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['scrn_response']) && count($result['scrn_response']) > 0)
                <h6 class="filter__title">Temps de réponse :</h6>
                @foreach ($result['scrn_response'] as $scrnResponse)
                <label class="filter__label" for="{{$scrnResponse}}">{{ $scrnResponse }}
                    <input type="checkbox" class="filter__chkbox" name="scrn_response[]" id="{{$scrnResponse}}" value="{{$scrnResponse}}"></input>
                </label>
                @endforeach
                @endif

                @if (!is_null($result['scrn_contrast']) && count($result['scrn_contrast']) > 0)
                <h6 class="filter__title">Contraste de l'écran:</h6>
                @foreach ($result['scrn_contrast'] as $scrnContrast)
                <label class="filter__label" for="{{$scrnContrast}}">{{ $scrnContrast }}
                    <input type="checkbox" class="filter__chkbox" name="scrn_contrast[]" id="{{$scrnContrast}}" value="{{$scrnContrast}}"></input>
                </label>
                @endforeach
                @endif

                <input class="filter__input neon" type="submit" name="ACTION" value="FILTRER" />
            </form>
        </div>

    </article>



    <article class="cardList">

        <div class="pagination">
            <ul class="pagination__container">
                @if ($categoryID)
                {{$products->appends(['cat_id' => $categoryID])->links("pagination::default")}}
                @else 
                {{$products->onEachSide(0)->links("pagination::default")}}
                @endif
            </ul>
        </div>

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