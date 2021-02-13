<?php

namespace App\Http\Controllers;

use App\Acteur;
use App\Film;
use Illuminate\Http\Request;

class ActeurController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lijst alle acteurs
        $acteurs = Acteur::orderBy('achternaam', 'ASC')->paginate(15);
        return view('acteurs.index',compact('acteurs'))->with('display_header', $display_header);;
    }
    public function actaantalfilms()
    {
        //lijst aantal films van acteurs
        $display_header = 'acteurs en aantal films waarin ze spelen';
        $acteurs = acteur::withCount('products')->orderBy('products_count', 'desc')->paginate(18);
        return view('acteurs.index',compact('acteurs'))->with('display_header', $display_header);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //een enkele film

        //$acteur = Acteur::find($id);
        $acteur = Acteur::where('id', $id)->first();
        return view('shop.acteurs', compact('acteur'));
    }
    //try for slug
    public function showq($slug)
    {
        $acteur = Acteur::where('slug', $slug)->first();
        return view('shop.acteurs', compact('acteur'));
    }
    public function showfilms($id)
    {
        //acteur speelt in de volgende film
        $films = acteurs()->get();
        return view('shop.acteurs', compact('films'));
    }
    /*
    public function show(Acteur $acteur)
    {
        //
    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Acteur $acteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acteur $acteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acteur  $acteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acteur $acteur)
    {
        //
    }
}
