<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Oglas;
use Validator;

class OglasController extends Controller {

	public function __construct() {
        $this->middleware('auth');
    }


	public function create() {
		return view('oglas.create');
	}

	public function store(Request $request) {

		$validator = Validator::make($request->all(), [
			'naslov' 		=> 'required | min:4 | max:50 | Unique:oglas',
			'opis'			=> 'required | min:20 | max:1000',
			'regija'		=> 'required',
			'cijena_mjesec'	=> 'required | numeric',
			'photo_url'		=> 'required',
			'smjestaj'		=> 'required',
			'soba'			=> 'required',
			]);

		if($validator->fails()) {
			return redirect('oglas/create')->withErrors($validator)->withInput();
		} else {
			$oglas = new Oglas;

			$oglas->user_id			= $request->user()->id;
			$oglas->naslov 			= Input::get('naslov');
			$oglas->opis 			= Input::get('opis');
			$oglas->regija			= Input::get('regija');
			$oglas->cijena_mjesec	= Input::get('cijena_mjesec');
			$oglas->photo_url		= Input::get('photo_url');
			$oglas->smjestaj		= Input::get('smjestaj');
			$oglas->soba 			= Input::get('soba');

			$oglas->save();

			return \Redirect::to('oglasview/show');

		}
	}

	public function show($id) {
		$users = User::All();
		$oglas = Oglas::All();
		return view('oglas/show', compact('oglas', 'users', 'id'));
	}


}