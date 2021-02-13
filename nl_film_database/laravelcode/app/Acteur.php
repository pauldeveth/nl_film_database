<?php

namespace App;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use Searchable;
    public function products()

    {
        return $this->belongsToMany('App\Product')->orderBy('jaar', 'ASC')->withTimestamps();
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        unset($array['voornaam']);
        unset($array['tussenvoegsel']);
        unset($array['achternaam']);
        unset($array['reg_imdb_id']);
        unset($array['geboren_op']);
        unset($array['gestorven_op']);
        unset($array['geboorteplaats']);
        unset($array['sterfplaats']);
        unset($array['wikipedia_url']);
        //unset($array['foto_bron']);
        unset($array['foto_bron_linktekst']);
        unset($array['filmfestival_url']);
        //unset($array['slug']);
        unset($array['created_at']);
        unset($array['updated_at']);
        return $array;
    }
}
