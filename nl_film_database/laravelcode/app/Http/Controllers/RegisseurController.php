<?php

namespace App\Http\Controllers;

use App\Regisseur;
use App\Product;
use Illuminate\Http\Request;

class RegisseurController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function index()
    {
        //lijst alle regisseurs
        $display_header = 'Lijst alle Regisseurs';
        $regisseurs = Regisseur::orderBy('achternaam', 'ASC')->paginate(18);
        return view('regisseurs.index',compact('regisseurs'))->with('display_header', $display_header);
    }

    public function regaantalfilms()
    {
        //lijst aantal films van regisseurs
        $display_header = 'Regisseurs en aantal gemaakte films';
        $regisseurs = Regisseur::withCount('products')->orderBy('products_count', 'desc')->paginate(18);
        return view('regisseurs.index',compact('regisseurs'))->with('display_header', $display_header);
    }

    public function indexadmin()
    {
        $regisseurs= Regisseur::all();
        return view('admin/regisseurs/indexadmin',compact('regisseurs'));
    }

    public function create()
    {
        return view('admin.regisseurs.create');
    }

    public function store(Request $request)
    {
        $regisseur= new \App\Regisseur;
        $regisseur->voornaam=$request->get('voornaam');
        $regisseur->tussenvoegsel=$request->get('tussenvoegsel');
        $regisseur->achternaam=$request->get('achternaam');
        $regisseur->reg_imdb_id=$request->get('reg_imdb_id');
        $regisseur->reg_bio=$request->get('reg_bio');
        $regisseur->slug=$request->get('slug');
        $regisseur->save();
        return redirect('admin/regisseurs/indexadmin')->with('success', 'Regisseur toegevoegd');
    }

    public function show($id)
    {
        $regisseur = Regisseur::where('id', $id)->first();
        return view('shop.regisseurs', compact('regisseur'));
    }
    
    public function showq($slug)
    {
        $regisseur = Regisseur::where('slug', $slug)->first();
        return view('shop.regisseurs', compact('regisseur'));
    }

    public function edit(Regisseur $request, $id)
    {
        $regisseur = Regisseur::find($id);
        return view('admin.regisseurs.edit',compact('regisseur','id'));
    }

    public function update(Request $request, $id)
    {
        $regisseur= \App\Regisseur::find($id);
        $regisseur->voornaam=$request->get('voornaam');
        $regisseur->tussenvoegsel=$request->get('tussenvoegsel');
        $regisseur->achternaam=$request->get('achternaam');
        $regisseur->reg_imdb_id=$request->get('reg_imdb_id');
        $regisseur->reg_bio=$request->get('reg_bio');
        $regisseur->slug=$request->get('slug');
        $regisseur->save();
        return redirect('admin/regisseurs/indexadmin')->with('success', 'Regisseur updated');
    }

    public function destroy(Regisseur $regisseur)
    {
        //
    }
}