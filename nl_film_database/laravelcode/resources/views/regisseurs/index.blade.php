@extends('layouts.master')
@section('title')
Regisseurs van de Nederlandse Film Database
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

	@foreach($regisseurs->chunk(6) as $regisseurChunk)
	<div class="row">
		@foreach($regisseurChunk as $regisseur)
		<div class="col-sm-12 col-md-2">
			<div class="thumbnail">
				
				@if(is_file("/home/tildeh1q/public_html/images/regisseurs/{$regisseur->slug}.jpg" ))
                <img src="{{ asset('images') }}{{ '/regisseurs/'.$regisseur->slug }}.jpg" alt="{{ $regisseur->slug }}"
                    class="img-responsive"></a>
                @else
                @endif
				@if(!is_null($regisseur->foto_bron))
                   Fotobron <a href="{{ $regisseur->foto_bron }}" target="_blank">{{ $regisseur->foto_bron_linktekst }}</a><br>
				@else
				@endif
					
				
				<a href="/regisseurs/{{$regisseur->slug}}" >{{$regisseur->slug}}</a><br>
				{{$regisseur->products_count}}
			
		
	</div>
</div>
@endforeach
</div>
@endforeach
</div>
{{ $regisseurs->links() }}
</center>
@endsection