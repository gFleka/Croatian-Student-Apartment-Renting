<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use App\Oglas;
use Validator;

class OglasController extends Controller {

	public function index() {
		$oglas = Oglas::all();
		return view('oglas.index', compact('oglas'));
	}

	public function create() {
		return view('oglas.create');
	}

	public function store() {

	}


}