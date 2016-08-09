<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\Korisnik;
use App\Oglas;



class KorisnikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $korisniks = Korisnik::all();
        return view('korisniks.index', compact('korisniks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('korisniks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $validator = Validator::make($request->all(), [
            'ime' => 'required | min:3 | max:15',
            'prezime' => 'required | min:3 | max:15',
            'mobitel' => 'required | numeric | digits_between:3,10 | Unique:korisniks',
            'datum_rodenja' => 'required | date | before:"now"',
            'email' => 'required | email | Unique:korisniks',
            'password' => 'required | min:6 | max:18 | confirmed',
           
        ]);
        if($validator->fails()) {
            return redirect('korisniks/create')->withErrors($validator)->withInput();
        } else {
            $korisnik = new Korisnik;
            $korisnik->ime = Input::get('ime');
            $korisnik->prezime = Input::get('prezime');
            $korisnik->mobitel = Input::get('mobitel');

            $datumNew = Input::get('datum_rodenja');
            $datumNew = date('Y-m-d', strtotime($datumNew));

            $korisnik->datum_rodenja = $datumNew;
            $korisnik->email = Input::get('email');
            $korisnik->password = Input::get('password');
            $korisnik->save();

            \Session::flash('message', 'Olalala');
            return \Redirect::to('korisniks');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Korisnik $korisnik) {
       return view('korisniks.show', compact('korisnik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Korisnik $korisnik) {
        return view('korisniks.edit', compact('korisnik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Korisnik $korisnik) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Korisnik $korisnik) {
        //
    }

    public function showLogin() {
        return \View::make('login');
    }

    public function doLogin() {
        
    }
}
