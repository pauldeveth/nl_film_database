<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use App\Product;

  

class SearchController extends Controller

{

    public function searchProducts(Request $request)
	{
	    return Product::where('title', 'LIKE', '%'.$request->q.'%')->get();
	}
}