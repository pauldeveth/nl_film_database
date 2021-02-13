@extends('layouts.master')
@section('title')
Laravel Shopping Cart
@endsection
@section('content')
<div class="row">
	<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
		<h1>Checkout</h1>
		<h4>Your Total: €{{ $total }}</h4>
		<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
			{{ Session::get('error') }}
		</div>
		<form action="{{ route('checkout') }}" method="post" id="checkout-form">
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Naam</label>
						<input type="text" id="name" class="form-control" required name="name">
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="address">Adres</label>
						<input type="text" id="address" class="form-control" required name="address">
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="postcode">Postcode</label>
						<input type="text" id="postcode" class="form-control" required name="postcode">
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="city">Stad</label>
						<input type="text" id="city" class="form-control" required name="city">
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" id="email" class="form-control" required name="email">
					</div>
				</div>
				<hr>
				
				
				
			</div>
			{{ csrf_field() }}
			<button type="submit" class="btn btn-success">Buy now</button>
		</form>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection