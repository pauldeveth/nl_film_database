@extends('layouts.master')
@section('title')
DVD Shop van de Nederlandse Film Database
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
<center>
	<h3>{{ $display_header }}</h3>
	@if(!empty($display_website))
	<a href="https://{{ $display_website }}" target="_blank">{{ $display_website }}</a>
	@endif
	
	<div class="container">
		@foreach($products->chunk(6) as $productChunk)
		<div class="row">
			@foreach($productChunk as $product)
			<div class="col-sm-12 col-md-2">
				<div class="thumbnail">
					<a href="{{ route('product.detailq', ['slug' => $product->slug]) }}">
						@switch($display_header)
						@case('Nederlandse Filmklassiekers / Filmmuseum')
						<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.filmmuseum.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('Hollandsch Glorie')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.hollandsch_glorie.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('Hollands Glorie')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.hollands_glorie.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('De Nederlandse Film Collectie')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.de-nederlandse-film-collectie.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('Rob Houwer Film Collectie')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.rob_houwer.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('De 100 procent NL Film Collectie')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.100procent.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('Hollands Filmgoud')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.hollands_filmgoud.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('Quality Film Collection')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.quality.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@case('Entertainment Collection')
					<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.entertainment.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
					@break
					@default
					@if(is_file("/home/tildeh1q/public_html/images/films/{$product->slug}.jpg" ))
        <img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.jpg" alt="{{ $product->slug }}" class="img-responsive" width="250"></a>
                @else
                <img src="{{ asset('images') }}/films/placeholder-image.jpg" alt="{{ $product->slug }}"
                    class="img-responsive"></a>
                @endif
					@endswitch

					<div class="caption">
						<h3><a href="{{ route('product.detailq', ['slug' => $product->slug]) }}">{{ $product->title }}</a></h3>
						<p class="description">{{ $product->jaar }}</p>
						@if($product->qty >=1)
						<div class="clearfix">
							<div class="pull-left price">€{{ $product->price }}</div>
							<a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
						</div>
						@endif
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@endforeach
	</div>
	{{ $products->links() }}
</center>
@endsection