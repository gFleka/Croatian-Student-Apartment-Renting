<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Oglas;

class OglasView extends Model {
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
