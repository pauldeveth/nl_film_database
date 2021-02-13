@extends('layouts.master')

@section('content')


    <div class="container">
      <h2>Edit Product Data</h2><br  />
        <form method="post" action="{{url('admin/products/edit', $id)}}">
         {{ csrf_field() }}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{$product->title}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">Price:</label>
              <input type="text" class="form-control" name="price" value="{{$product->price}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="qty">Qty:</label>
              <input type="text" class="form-control" name="qty" value="{{$product->qty}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="sku">SKU:</label>
              <input type="text" class="form-control" name="sku" value="{{$product->sku}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="naam">Naam:</label>
              <input type="text" class="form-control" name="naam" value="{{$product->naam}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="jaar">Jaar:</label>
              <input type="text" class="form-control" name="jaar" value="{{$product->jaar}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="omroepnl_link">Omroepnl_link:</label>
              <input type="text" class="form-control" name="omroepnl_link" value="{{$product->omroepnl_link}}">
            </div>
          </div>
          
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="omroepnl_vanmoviemeter">Omroepnl_vanmoviemeter:</label>
              <input type="text" class="form-control" name="omroepnl_vanmoviemeter" value="{{$product->omroepnl_vanmoviemeter}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="npo_start_plus">Npo_start_plus:</label>
              <input type="text" class="form-control" name="npo_start_plus" value="{{$product->npo_start_plus}}">
            </div>
          </div>
          
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="bol_com">Bol_com:</label>
              <input type="text" class="form-control" name="bol_com" value="{{$product->bol_com}}">
            </div>
          </div>
          
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="omroepnl_identifier">Omroepnl_identifier:</label>
              <input type="text" class="form-control" name="omroepnl_identifier" value="{{$product->omroepnl_identifier}}">
            </div>
          </div>
          

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="verhaal">Verhaal:</label>
              <input type="text" class="form-control" name="verhaal" value="{{$product->verhaal}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="imdbid">Imdbid:</label>
              <input type="text" class="form-control" name="imdbid" value="{{$product->imdbid}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="moviemeter_id">Moviemeter_id:</label>
              <input type="text" class="form-control" name="moviemeter_id" value="{{$product->moviemeter_id}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="imdb_cijfer">Imdb_cijfer:</label>
              <input type="text" class="form-control" name="imdb_cijfer" value="{{$product->imdb_cijfer}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="moviemeter_cijfer">Moviemeter_cijfer:</label>
            <input type="text" class="form-control" name="moviemeter_cijfer" value="{{$product->moviemeter_cijfer}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="reeks">Reeks:</label>
              <input type="text" class="form-control" name="reeks" value="{{$product->reeks}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="studio">Studio:</label>
              <input type="text" class="form-control" name="studio" value="{{$product->studio}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="omroep">Omroep:</label>
              <input type="text" class="form-control" name="omroep" value="{{$product->omroep}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="duur">Duur:</label>
              <input type="text" class="form-control" name="duur" value="{{$product->duur}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="land">Land:</label>
              <input type="text" class="form-control" name="land" value="{{$product->land}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="boek_auteur">Boek_auteur:</label>
            <input type="text" class="form-control" name="boek_auteur" value="{{$product->boek_auteur}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="trailer">Trailer:</label>
              <input type="text" class="form-control" name="trailer" value="{{$product->trailer}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="leeftijd">Leeftijd:</label>
              <input type="text" class="form-control" name="leeftijd" value="{{$product->leeftijd}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="dvdbezit">Dvdbezit:</label>
              <input type="text" class="form-control" name="dvdbezit" value="{{$product->dvdbezit}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="boekbezit">Boekbezit:</label>
              <input type="text" class="form-control" name="boekbezit" value="{{$product->boekbezit}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="slug">Slug:</label>
              <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
           
          </div>
        </div>
      </form>
    </div>

@endsection