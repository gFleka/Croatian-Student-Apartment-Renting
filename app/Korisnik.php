<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model {
    public function oglasi() {
    	return $this->hasMany('App\Oglas');
    }

    public function setPasswordAttribute($password) {
    	$this->attributes['password'] = bcrypt($password);
    }
}
