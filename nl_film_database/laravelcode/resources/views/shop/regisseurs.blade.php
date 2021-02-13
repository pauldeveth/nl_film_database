@extends('layouts.master')
@section('title')
    {{ $regisseur->voornaam }} {{ $regisseur->tussenvoegsel }} {{ $regisseur->achternaam }}
@endsection
@section('content')
    @if (Session::has('success'))
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
                <li>
                    {{ $regisseur->voornaam }} {{ $regisseur->tussenvoegsel }} {{ $regisseur->achternaam }}
                    @if(is_file("/home/tildeh1q/public_html/images/regisseurs/{$regisseur->slug}.jpg"))
                        <img src="{{ asset('images') }}{{ '/regisseurs/' . $regisseur->slug }}.jpg"
                            alt="{{ $regisseur->slug }}" class="img-responsive"></a>
                    @else
                    @endif
                </li>
                @if (!is_null($regisseur->foto_bron))
                    Fotobron <a href="{{ $regisseur->foto_bron }}"
                        target="_blank">{{ $regisseur->foto_bron_linktekst }}</a><br>
                @else
                @endif
                @if (!is_null($regisseur->geboren_op))
                    <li>
                        <?php
                        $date = Carbon\Carbon::parse($regisseur->geboren_op)->locale('nl_NL');
                        echo 'Geboren ';
                        echo '<br>';
                        echo $date->day . ' ' . $date->monthName . ' ' . $date->year;
                        ?>
                    </li>
                @endif
                @if (!is_null($regisseur->geboorteplaats))
                    {{ $regisseur->geboorteplaats }}
                @endif
                @if (!is_null($regisseur->gestorven_op))
                    <li>
                        <?php
                        $date = Carbon\Carbon::parse($regisseur->gestorven_op)->locale('nl_NL');
                        echo 'Overleden ';
                        echo '<br>';
                        echo $date->day . ' ' . $date->monthName . ' ' . $date->year;
                        ?>
                    </li>
                @endif
                @if (!is_null($regisseur->sterfplaats))
                    {{ $regisseur->sterfplaats }}
                @endif

                <li><a href="https://www.imdb.com/name/nm{{ $regisseur->reg_imdb_id }}" target="_blank"> Op Imdb </a>
                </li>
                @if (!is_null($regisseur->reg_moviemeter_id))
                    <li><a href="https://www.moviemeter.nl/director/{{ $regisseur->reg_moviemeter_id }}" target="_blank">
                            Op Moviemeter </a></li>
                @endif

                @if (!is_null($regisseur->wikipedia_url))
                    <li><a href="https://nl.wikipedia.org/wiki/{{ $regisseur->wikipedia_url }}" target="_blank">
                            Op Wikipedia </a>
                    </li>
                @else
                    <li><a href="https://nl.wikipedia.org/w/index.php?search={{ $regisseur->slug }}">check wikipedia</a>
                    </li>
                @endif

                @if ($regisseur->filmfestival_url)
                    <li><a href="https://www.filmfestival.nl/persoon/{{ $regisseur->slug }}" target="_blank">Op
                            Filmfestival.nl</a>
                @endif
            </ul>
        </div>
        <div class="col-sm-9 col-md-9">
            <div class="caption">
                Regisseerde de volgende films
                @foreach ($regisseur->products->sortByDesc('jaar')->chunk(4) as $productChunk)
                    <div class="row">
                        @foreach ($productChunk as $product)
                            <div class="col-sm-4 col-md-3">
                                <div class="thumbnail">
                                    <a href="{{ route('product.detailq', ['slug' => $product->slug]) }}">
                                        @if(is_file("/home/tildeh1q/public_html/images/films/{$product->slug}.jpg"))
                                            <img src="{{ asset('images') }}{{ '/films/' . $product->slug }}.jpg"
                                                alt="{{ $product->slug }}" class="img-responsive" width="250">
                                    </a>
                                @else
                                    <img src="{{ asset('images') }}/films/placeholder-image.jpg"
                                        alt="{{ $product->slug }}" class="img-responsive"></a>
                        @endif
                        <div class="caption">
                            <h3>{{ $product->title }}</h3><i class="fa fa-star" aria-hidden="true"></i>
                            ({{ $product->imdb_cijfer }}) {{ $product->jaar }}
                            <p class="description">{{ $product->description }}</p>
                            @if ($product->qty >= 1)
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
