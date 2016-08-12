<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QueriesController extends Controller {

	public function store(Request $request) {
		$query = $request->input('search');

		$hits = \DB::table('oglas')->where('naslov', 'LIKE', '%' . $query . '%')->paginate(10);

		return view('queries.search', compact('hits', 'query'));
	}


}
