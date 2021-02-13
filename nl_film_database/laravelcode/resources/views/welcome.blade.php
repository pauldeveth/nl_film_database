@extends('layouts.master')

@section('content')

               <div class="container">
    @if(isset($details))
        <p> De zoekresultaten voor je opdracht <b> {{ $query }} </b> zijn :</p>
    <h2>Resultaten</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th>Film</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $product)
            <tr>
                <td><a href="/detailq/{{$product->slug}}"> {{ $product->title }} </a></td>
                <td>{{$product->jaar}}</td>
            </tr>
           
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection