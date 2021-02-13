<?php

namespace App;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Searchable;
    public function films()

    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        unset($array['created_at']);
        unset($array['updated_at']);
        return $array;
    }
}