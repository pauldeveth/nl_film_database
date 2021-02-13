<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Admin Product Pagina</title>
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
     <h2>Products</h2>
    <table class="table table-striped">
    <thead>
      <tr>
		<th>id</th>
		<th>title</th>
		<th>price</th>
		<th>qty</th>
		<th>sku</th>
		<th>naam</th>
		<th>jaar</th>
		<th>omroepnl_link</th>
		<th>omroepnl_vanmoviemeter</th>
		<th>npo_start_plus</th>
		<th>bol_com</th>
		<th>omroepnl_identifier</th>
		<th>verhaal</th>
		<th>imdbid</th>
		<th>moviemeter_id</th>
		<th>imdb_cijfer</th>
		<th>moviemeter_cijfer</th>
		<th>reeks</th>
		<th>studio</th>
		<th>omroep</th>
		<th>duur</th>
		<th>land</th>
		<th>boek_auteur</th>
		<th>trailer</th>
		<th>leeftijd</th>
		<th>dvdbezit</th>
		<th>boekbezit</th>
		<th>slug</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($products as $product)
      <tr>
      	<td>{{$product['id']}}</td>
		<td>{{$product['title']}}</td>
		<td>{{$product['price']}}</td>
		<td>{{$product['qty']}}</td>
		<td>{{$product['sku']}}</td>
		<td>{{$product['naam']}}</td>
		<td>{{$product['jaar']}}</td>
		<td>{{$product['omroepnl_link']}}</td>
		<td>{{$product['omroepnl_vanmoviemeter']}}</td>
		<td>{{$product['npo_start_plus']}}</td>
		<td>{{$product['bol_com']}}</td>
		<td>{{$product['omroepnl_identifier']}}</td>
		<td>{{$product['verhaal']}}</td>
		<td>{{$product['imdbid']}}</td>
		<td>{{$product['moviemeter_id']}}</td>
		<td>{{$product['imdb_cijfer']}}</td>
		<td>{{$product['moviemeter_cijfer']}}</td>
		<td>{{$product['reeks']}}</td>
		<td>{{$product['studio']}}</td>
		<td>{{$product['omroep']}}</td>
		<td>{{$product['duur']}}</td>
		<td>{{$product['land']}}</td>
		<td>{{$product['boek_auteur']}}</td>
		<td>{{$product['trailer']}}</td>
		<td>{{$product['leeftijd']}}</td>
		<td>{{$product['dvdbezit']}}</td>
		<td>{{$product['boekbezit']}}</td>
		<td>{{$product['slug']}}</td>
        <td><a href="{{ url('admin/products/edit', $product['id']) }}" class="btn btn-warning">Edit</a></td>

        
       {{ csrf_field() }}
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
