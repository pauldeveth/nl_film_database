@extends('layouts.master')
@section('title')
{{ $acteur->voornaam }} {{ $acteur->tussenvoegsel }} {{ $acteur->achternaam }}
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
        <ul>
            <li>{{ $acteur->voornaam }} {{ $acteur->tussenvoegsel }} {{ $acteur->achternaam }}
                @if(is_file("/home/tildeh1q/public_html/images/acteurs/oud/{$acteur->slug}.jpg" ))
                <img src="{{ asset('images') }}{{ '/acteurs/oud/'.$acteur->slug }}.jpg" alt="{{ $acteur->slug }}"
                    class="img-responsive"></a>
                @else
                <img src="{{ asset('images') }}/films/placeholder-image.jpg" alt="{{ $acteur->slug }}"
                    class="img-responsive"></a>
                @endif
            </li>
            @if(!is_null($acteur->foto_bron))
                   Fotobron <a href="{{ $acteur->foto_bron }}" target="_blank">{{ $acteur->foto_bron_linktekst }}</a><br>
                @else
                @endif
            @if(!is_null($acteur->geboren_op))
            <li>
                <?php 
            $date = Carbon\Carbon::parse($acteur->geboren_op)->locale('nl_NL');
            echo "Geboren ";
            echo "<br>";
            echo $date->day . " " . $date->monthName . " " . $date->year;
            ?>
            </li>
            @endif
            @if(!is_null($acteur->geboorteplaats))
            {{ $acteur->geboorteplaats }}
            @endif
            @if(!is_null($acteur->gestorven_op))
            <li>
                <?php 
            $date = Carbon\Carbon::parse($acteur->gestorven_op)->locale('nl_NL');
            echo "Overleden ";
            echo "<br>";
            echo $date->day . " " . $date->monthName . " " . $date->year;
            ?>
            </li>
            @endif
            @if(!is_null($acteur->sterfplaats))
            {{ $acteur->sterfplaats }}
            @endif
            <li><a href="http://www.imdb.com/name/nm{{ $acteur->act_imdb_id }}" target="_blank"> Op Imdb </a>
            </li>
            @if(!is_null($acteur->wikipedia_url))
            <li><a href="https://nl.wikipedia.org/wiki/{{ $acteur->wikipedia_url }}" target="_blank"> Op Wikipedia </a>
            </li>
            @endif
            @if($acteur->filmfestival_url)
            <li><a href="https://www.filmfestival.nl/persoon/{{ $acteur->slug }}" target="_blank"> Op
                    Filmfestival.nl</a>
            </li>
            @endif
        </ul>
    </div>
    <div class="col-sm-9 col-md-9">
        <div class="caption">
            Speelt in de volgende films
            @foreach($acteur->products->sortByDesc('jaar')->chunk(4) as $productChunk)
            <div class="row">
                @foreach($productChunk as $product)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <a href="{{ route('product.detailq', ['slug' => $product->slug]) }}">
                            

                                @if(is_file("/home/tildeh1q/public_html/images/films/{$product->slug}.jpg" ))
                                <img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.jpg"
                                alt="{{ $product->slug }}" class="img-responsive"></a>
                @else
                <img src="{{ asset('images') }}{{ '/films/placeholder-image' }}.jpg"
                                alt="{{ $product->slug }}" class="img-responsive"></a>
                @endif

                            


                        <div class="caption">
                            <h5>{{ $product->title }}({{ $product->jaar }})</h5>

                            <p class="description">{{ $product->description }}</p>
                            @if(file_exists('images/acteurs/'.$product->slug.'.'.$acteur->act_imdb_id.'.'.$acteur->slug.'.png'))
                            <img src="{{ asset('images') }}{{ '/acteurs/'.$product->slug.'.'.$acteur->act_imdb_id.'.'.$acteur->slug }}.png"
                                alt="{{ $acteur->slug }} in {{ $product->slug }}" class="img-responsive"></a>
                            @else
                            @endif
                            @if($product->qty >=1)
                            <div class="clearfix">
                                <div class="pull-left price">€{{ $product->price }}</div>
                                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                    class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection