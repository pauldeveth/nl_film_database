@extends('layouts.master')
@section('title')
acteurs van de Nederlandse Film Database
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

	@foreach($acteurs->chunk(6) as $acteurChunk)
	<div class="row">
		@foreach($acteurChunk as $acteur)
		<div class="col-sm-12 col-md-2">
			<div class="thumbnail">
				
				@if(is_file("/home/YOURUSERNAME_INPATH/public_html/images/acteurs/oud/{$acteur->slug}.jpg" ))
                <img src="{{ asset('images') }}{{ '/acteurs/oud/'.$acteur->slug }}.jpg" alt="{{ $acteur->slug }}"
                    class="img-responsive"></a>
                @else
                @endif
					
				
				<a href="/acteurs/{{$acteur->slug}}" >{{$acteur->slug}}</a><br>
				{{$acteur->products_count}}
			
		
	</div>
</div>
@endforeach
</div>
@endforeach
</div>
{{ $acteurs->links() }}
</center>
@endsection