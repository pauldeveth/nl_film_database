@extends('layouts.master')

@section('content')


    <div class="container">
      <h2>Edit Regisseur Data</h2><br  />
        <form method="post" action="{{url('admin/regisseurs/edit', $id)}}">
         {{ csrf_field() }}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="voornaam">Voornaam:</label>
            <input type="text" class="form-control" name="voornaam" value="{{$regisseur->voornaam}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="tussenvoegsel">Tussenvoegsel:</label>
              <input type="text" class="form-control" name="tussenvoegsel" value="{{$regisseur->tussenvoegsel}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="achternaam">Achternaam:</label>
              <input type="text" class="form-control" name="achternaam" value="{{$regisseur->achternaam}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="reg_imdb_id">Regimdb_id:</label>
              <input type="text" class="form-control" name="reg_imdb_id" value="{{$regisseur->reg_imdb_id}}">
              <a href="https://www.imdb.com/name/nm{{$regisseur->reg_imdb_id}}" target="_blank" >op imdb</a>
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="reg_bio">Regbio:</label>
              <input type="text" class="form-control" name="reg_bio" value="{{$regisseur->reg_bio}}">
            </div>
          </div>

           <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="slug">Slug:</label>
              <input type="text" class="form-control" name="slug" value="{{$regisseur->slug}}">
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