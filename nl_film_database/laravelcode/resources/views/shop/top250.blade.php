@extends('layouts.master')
@section('title')
Top 250 van Nederlandse Films
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
<h3>{{ $display_header }}</h3>
@foreach($products->chunk(4) as $productChunk)
<div class="row">
	@foreach($productChunk as $key => $product)
	<div class="col-sm-12 col-md-3">
		<center><b>{{ ($products->currentpage()-1) * $products->perpage() + $key + 1 }}</b></center>
		<div class="thumbnail">
			<a href="{{ route('product.detailq', ['slug' => $product->slug]) }}">
				<img src="{{ asset('images') }}{{ '/films/'.$product->slug }}.jpg" alt="{{ $product->slug }}" class="img-responsive"></a>
			<div class="caption">
				<h3>{{ $product->title }}</h3>
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
{{ $products->links() }}
@endsection