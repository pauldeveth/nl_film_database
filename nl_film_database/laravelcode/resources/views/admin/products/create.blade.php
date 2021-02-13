@extends('layouts.master')

@section('content')
    


    <div class="container">
      <h2>Create Product</h2><br/>
      <form method="post" action="{{url('admin/products/create')}}">
        
        <div class="row">
          <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="title">Title:</label>
              <input type="text" class="form-control" name="title">
           </div>
        </div>

        <div class="row">
         <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="price">Price:</label>
              <input type="text" class="form-control" name="price">
            </div>
        </div>
          
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="qty">Qty:</label>
            <input type="text" class="form-control" name="qty">
            </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="sku">Sku:</label>
            <input type="text" class="form-control" name="sku">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="naam">Naam:</label>
            <input type="text" class="form-control" name="naam">
            </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="jaar">Jaar:</label>
              <input type="text" class="form-control" name="jaar">
           </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="omroepnl_link">Omroepnl_link:</label>
            <input type="text" class="form-control" name="omroepnl_link">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="npo_start_plus">Npo_start_plus:</label>
            <input type="text" class="form-control" name="npo_start_plus">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="bol_com">Bol_com:</label>
            <input type="text" class="form-control" name="bol_com">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="omroepnl_identifier">Omroepnl_identifier:</label>
            <input type="text" class="form-control" name="omroepnl_identifier">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="verhaal">Verhaal:</label>
            <input type="text" class="form-control" name="verhaal">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="imdbid">Imdbid:</label>
              <input type="text" class="form-control" name="imdbid">
           </div>
        </div>

        <div class="row">
         <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="moviemeter_id">Moviemeter_id:</label>
              <input type="text" class="form-control" name="moviemeter_id">
            </div>
        </div>
          
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="imdb_cijfer">Imdb_cijfer:</label>
            <input type="text" class="form-control" name="imdb_cijfer">
            </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="moviemeter_cijfer">Moviemeter_cijfer:</label>
            <input type="text" class="form-control" name="moviemeter_cijfer">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="reeks">Reeks:</label>
            <input type="text" class="form-control" name="reeks">
            </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="studio">Studio:</label>
              <input type="text" class="form-control" name="studio">
           </div>
        </div>

        <div class="row">
         <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="omroep">Omroep:</label>
              <input type="text" class="form-control" name="omroep">
            </div>
        </div>
          
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="duur">Duur:</label>
            <input type="text" class="form-control" name="duur">
            </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="land">Land:</label>
            <input type="text" class="form-control" name="land">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="boek_auteur">Boek_auteur:</label>
            <input type="text" class="form-control" name="boek_auteur">
            </div>
        </div>
        

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="trailer">Trailer:</label>
            <input type="text" class="form-control" name="trailer">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="leeftijd">Leeftijd:</label>
            <input type="text" class="form-control" name="leeftijd">
            </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="dvdbezit">Dvdbezit:</label>
            <input type="text" class="form-control" name="dvdbezit">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="boekbezit">Boekbezit:</label>
            <input type="text" class="form-control" name="boekbezit">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="slug">Slug:</label>
            <input type="text" class="form-control" name="slug">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Submit</button>
            {{ csrf_field() }}
          </div>
        </div>
      </form>
    </div>
@endsection