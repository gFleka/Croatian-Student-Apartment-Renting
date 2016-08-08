<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oglas extends Model {
    public function korisnik() {
    	return $this->belongsTo('App\Korisnik');
    }
}
