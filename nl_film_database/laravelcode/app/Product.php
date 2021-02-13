<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Product extends Model
{
    protected $fillable = ['imagePath', 'title', 'description', 'price'];
    use Searchable;

    public function acteurs()
    {
        return $this->belongsToMany('App\Acteur')->withPivot('rol');
    }
    public function regisseurs()
    {
        return $this->belongsToMany('App\Regisseur');
    }
    public function genres()
    {
        //return $this->belongsToMany('App\Genre');
        return $this->belongsToMany('App\Genre', 'genre_product', 'product_id', 'genre_id');
    }
    public function countries()
    {
        return $this->belongsToMany('App\Country', 'country_product', 'product_id', 'country_id');
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        //unset($array['id']);
        //unset($array['title']);
        //unset($array['alt_title']);
        unset($array['slug']);
        unset($array['jaar']);
        unset($array['imdbid']);
        unset($array['imdb_cijfer']);
        unset($array['moviemeter_id']);
        unset($array['moviemeter_cijfer']);
        unset($array['tvmeter_id']);
        unset($array['tvmeter_cijfer']);
        unset($array['duur']);
        unset($array['wikipedia_url']);
        unset($array['filmfestival_url']);
        unset($array['filmfestival_alt_slug']);
        unset($array['trailer']);
        unset($array['omroepnl_identifier']);
        unset($array['leeftijd']);
        unset($array['picl_url']);
        unset($array['kijkenopyoutube']);
        unset($array['kijkenopcinemember']);
        unset($array['kijkenopvimeo']);
        unset($array['kijkenopvideoland']);
        unset($array['sku']);
        unset($array['bol_com']);
        unset($array['amazon']);
        unset($array['scenario']);
        unset($array['studio']);
        unset($array['verhaal']);
        unset($array['omroep']);
        //unset($array['boek_auteur']);
        unset($array['boek_ed2klink']);
        unset($array['bonusfilm']);
        unset($array['sealed']);
        unset($array['bluray_bezit']);
        unset($array['dvdbezit']);
        unset($array['reeks']);
        unset($array['qty']);
        unset($array['price']);
        unset($array['local_file']);
        unset($array['local_filepath']);
        unset($array['aspect_ratio_local_file']);
        unset($array['boekbezit']);
        unset($array['visible']);
        unset($array['netflixid']);
        unset($array['budget_wiki']);
        unset($array['created_at']);
        unset($array['updated_at']);
        return $array;
    }
}