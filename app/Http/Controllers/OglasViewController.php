<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Oglas;

class OglasViewController extends Controller {

	
   /* Lists all of the Ads */	
	public function index() {
		$oglas = Oglas::all();
		$users = User::all();
		return view('oglas.index', compact('users', 'oglas'));
	}
}
