<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Oglas;
use App\User;

class OglasSearchController extends Controller
{
    public function index() {
		$users = User::All();
		$oglas = Oglas::All();

		return view('oglassearch.index');
	}

	public function search(Request $request) {

		$query = Request::input('search');

		$hits = DB::table('oglas')->where('naslov', 'LIKE', '%' . $query . '%')->paginate(10);

		return view('oglassearch.search', compact('oglas', 'query'));
	}
}
