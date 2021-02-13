@extends('layouts.master')
@section('title')
{{ $product->title }}
@endsection
@section('content')
@if(Session::has('success'))
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <div id="charge-message" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-sm-3 col-md-3">
        
        @if(is_file("/home/tildeh1q/public_html/images/films/{$product->slug}.jpg" ))
        <img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.jpg" alt="{{ $product->slug }}" class="img-responsive" width="250"></a>
                @else
                <img src="{{ asset('images') }}/films/placeholder-image.jpg" alt="{{ $product->slug }}"
                    class="img-responsive"></a>
                @endif
                @if(!is_null($product->studio))
                <b>Productie Studio</b>
                <ul>
                <li>{{ $product->studio }}</li>
                </ul>
                @endif
                
        <b>Verwijzingen</b>
        <ol>
            @if(!is_null($product->imdbid))
            <li><a href="https://www.imdb.com/title/tt{{$product->imdbid}}" target="_blank">Op Imdb.com
                    (rating {{ $product->imdb_cijfer }})</a></li>
            @endif
            @if(!is_null($product->moviemeter_id))
            <li><a href="https://www.moviemeter.nl/film/{{$product->moviemeter_id}}" target="_blank">Op Moviemeter.nl
                    (rating {{ $product->moviemeter_cijfer }})</a></li>
            @endif
            @if(!is_null($product->tvmeter_id))
            <li><a href="https://www.tvmeter.nl/season/{{$product->tvmeter_id}}" target="_blank">Op Tvmeter.nl
                    (rating {{ $product->tvmeter_cijfer }})</a></li>
            @endif
            @if(!is_null($product->wikipedia_url))
            <li><a href="https://nl.wikipedia.org/wiki/{{ $product->wikipedia_url }}" target="_blank">Op Wikipedia</a>
            </li>
            @endif
            @if($product->filmfestival_url)
            <li><a href="https://www.filmfestival.nl/archief/{{ $product->slug }}" target="_blank">Op Filmfestival.nl</a>
            </li>
            @endif
            @if(!is_null($product->filmfestival_alt_slug))
            <li><a href="https://www.filmfestival.nl/archief/{{$product->filmfestival_alt_slug}}" target="_blank">Op Filmfestival.nl</a>
            </li>
            @endif
            @if(!is_null($product->kijkenopyoutube))
            <li><a href="https://www.youtube.com/watch?v={{ $product->kijkenopyoutube }}" target="_blank">Kijken op YouTube</a>
            </li>
            @endif
            @if(!is_null($product->kijkenopvimeo))
            <li><a href="https://www.vimeo.com/{{ $product->kijkenopvimeo }}" target="_blank">Kijken op Vimeo channel</a>
            </li>
            @endif
            @if($product->kijkenopcinemember)
            <li><a href="https://www.cinemember.nl/nl/films/{{ $product->slug }}" target="_blank">Kijken op Cinemember.nl</a>
            </li>
            @endif
            @if(!is_null($product->netflixid))
            <li><a href="https://www.netflix.com/title/{{ $product->netflixid }}" target="_blank">Kijken op Netflix</a>
            </li>
            @endif
            <?php if (Auth::check()) {
                $display_ed2k = true;
            } else {
                $display_ed2k = false;
            }
            ?>
            @if ( $display_ed2k == true )
            @if (!empty($product->ed2klink1))
            <li>&rarr;<a href="ed2k://|file|{{ $product->title }}.{{ $product->jaar }}.dothekje.nl.avi{{ $product->ed2klink1 }}">Ed2k
                    Netwerk</a>&larr;
            </li>
            @endif
            @if (!empty($product->ed2klink2))
            <li>&rarr;<a href="ed2k://|file|{{ $product->title }}.{{ $product->jaar }}.dothekje.nl.avi{{ $product->ed2klink2 }}">Ed2k
                    Netwerk #2</a>&larr;
            </li>
            @endif
            @if (!empty($product->boek_ed2klink))
            <li>&rarr;<a href="ed2k://|file|{{ $product->title }}{{ $product->jaar }}dothekje.nl.epub{{ $product->boek_ed2klink }}">Ed2k
                    Boek</a>&larr;
            </li>
            @endif
            @endif
            @if (!empty($product->omroepnl_identifier))
            <li><a href="https://www.npostart.nl/{{ $product->omroepnl_identifier }}" target="_blank">Kijken op NPO START</a></li>
            @endif
            @if (!empty($product->picl_url))
            <li><a href="https://www.picl.nl/films/{{ $product->picl_url }}" target="_blank">Kijken op Picl.nl</a></li>
            @endif
            @if (!empty($product->bol_com))
            <li><a href="https://partnerprogramma.bol.com/click/click?p=1&t=url&s=53623&url={{ $product->bol_com }}" target="_blank">Kopen op Bol.com</a></li>
            @endif
            @if (!empty($product->amazon))
            <li><a href="https://amzn.to/{{ $product->amazon }}" target="_blank">Kopen op Amazon</a></li>
            @endif
            @if (!empty($product->trailer))
            <li><a href="https://www.youtube.com/watch?v={{ $product->trailer }}" target="_blank">Trailer op YouTube</a></li>
            @endif
            @if (!empty($product->sku))
            <li><a href="https://duckduckgo.com/?q={{ $product->sku }}" target="_blank">SKU op DuckDuckGo</a></li>
            @endif
            @if (!empty($product->sku))
            <li><a href="https://www.google.nl/search?q={{ $product->sku }}" target="_blank">SKU op Google</a></li>
            @endif
        </ol>
    </div>
    <div class="col-sm-5 col-md-5">
        <div class="caption">
            <h4>{{ $product->title }}</h4>
            @if (!empty($product->alt_title))
            <h4>Alt titel:{{ $product->alt_title }}</h4>
            @endif
            
            Geregiseerd door
            <ul>
                @foreach ($product->regisseurs->sortBy('achternaam') as $regisseur)
                <li>
                    <a href="/regisseurs/{{$regisseur->slug}}">{{ $regisseur->voornaam }}
                        {{ $regisseur->tussenvoegsel }} {{ $regisseur->achternaam }}</a>
                </li>
                @endforeach
            </ul>
            <ul>
            @if (!empty($product->scenario))
            <li>Scenario:{{ $product->scenario }}</li>
            @endif
            </ul>
            @foreach ($product->genres->sortBy('genre_naam') as $genre)
            | <a href="/{{ $genre->genre_naam }}">{{ $genre->genre_naam }}</a> | 
            @endforeach
            <br>
            @foreach ($product->countries->sortBy('country_naam') as $country)
            | <a href="/{{ $country->country_naam }}">{{ $country->country_naam }}</a> |
            @endforeach
            <br>
            {{ $product->jaar }} </br>
            @if (!empty($product->duur))
            Duur: {{ $product->duur }} minuten<br>
            @endif
            @if (!empty($product->leeftijd))
            Leeftijd: {{ $product->leeftijd }}<br>
            @endif
            @if (!empty($product->budget_wiki))
            Budget: € {{ $product->budget_wiki }}<br>
            @endif
            @if (!empty($product->boek_auteur))
            Auteur boekverfilming: {{ $product->boek_auteur }} <br>
            @endif
            {{ $product->verhaal }}</br>
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        Acteurs in deze film
        <ul>
            @foreach ($product->acteurs->sortBy('achternaam') as $acteur)
            <li>
                <a href="/acteurs/{{$acteur->slug}}">{{ $acteur->voornaam }} {{ $acteur->tussenvoegsel }}
                    {{ $acteur->achternaam }}</a>
                    @if(!is_null($acteur->pivot->rol)) als {{ $acteur->pivot->rol }}
                    @endif

                @if(file_exists('images/acteurs/'.$product->slug.'.'.$acteur->act_imdb_id.'.'.$acteur->slug.'.png'))
                <img src="{{ asset('images') }}{{ '/acteurs/'.$product->slug.'.'.$acteur->act_imdb_id.'.'.$acteur->slug }}.png" alt="{{ $acteur->slug }} in {{ $product->slug }}" class="img-responsive"></a>
                @else
                @endif
            </li>
            @endforeach
        </ul>
        <p class="description">{{ $product->description }}</p>
        @if($product->qty >=1)
        <div class="clearfix">
            <div class="pull-left price">€{{ $product->price }}</div>
            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
        </div>
        @endif
    </div>
</div>
@endsection