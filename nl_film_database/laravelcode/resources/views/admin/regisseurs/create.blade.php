@extends('layouts.master')

@section('content')
    


    <div class="container">
      <h2>Create Regisseur</h2><br/>
      <form method="post" action="{{url('admin/regisseurs/create')}}">
        
        <div class="row">
          <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="voornaam">Voornaam:</label>
              <input type="text" class="form-control" name="voornaam">
           </div>
        </div>

        <div class="row">
         <div class="col-md-4"></div>
           <div class="form-group col-md-4">
             <label for="tussenvoegsel">Tussenvoegsel:</label>
              <input type="text" class="form-control" name="tussenvoegsel">
            </div>
        </div>
          
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="achternaam">Achternaam:</label>
            <input type="text" class="form-control" name="achternaam">
            </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="reg_imdb_id">Reg_imdb_id:</label>
            <input type="text" class="form-control" name="reg_imdb_id">
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="reg_bio">Reg_bio:</label>
            <input type="text" class="form-control" name="reg_bio">
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