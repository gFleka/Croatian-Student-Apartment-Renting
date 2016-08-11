<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oglas extends Model {
    
	protected $table = 'oglas';

	protected $fillable = ['naslov', 'opis', 'regija', 'cijena_mjesec', 'photo_url', 'smjestaj', 'soba',];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
