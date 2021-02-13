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
	<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">user_id={{$order->user_id}}user_address={{$order->address}}city={{$order->city}}
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">${{ $item['price'] }}</span>
                                    {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Totaal Prijs: ${{ $order->cart->totalPrice }}</strong>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
            
	</div>
	
</center>
@endsection
