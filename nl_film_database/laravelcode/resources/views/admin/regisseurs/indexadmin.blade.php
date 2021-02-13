<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Admin Regisseurs Pagina</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <h2>Regisseurs</h2>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Voornaam</th>
        <th>tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Reg_imdb_id</th>
        <th>Reg_bio</th>
        <th>Slug</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($regisseurs as $regisseur)
      <tr>
        <td>{{$regisseur['id']}}</td>
        <td>{{$regisseur['voornaam']}}</td>
        <td>{{$regisseur['tussenvoegsel']}}</td>
        <td>{{$regisseur['achternaam']}}</td>
        <td>{{$regisseur['reg_imdb_id']}}</td>
        <td>{{$regisseur['reg_bio']}}</td>
        <td>{{$regisseur['slug']}}</td>

        <td><a href="{{ url('admin/regisseurs/edit', $regisseur['id']) }}" class="btn btn-warning">Edit</a></td>

        
       {{ csrf_field() }}
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
