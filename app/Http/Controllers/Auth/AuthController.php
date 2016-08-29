<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'ime' => 'required|max:255',
            'prezime' => 'required|max:255',
            'mobitel' => 'required|numeric|digits_between:3,10|Unique:users',
            'datum_rodenja' => 'required|date|before:"now',
            'email' => 'required|email|max:255|Unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {

        $datumNew = $data['datum_rodenja'];
        $datumNew = date('Y-m-d', strtotime($datumNew));
        
        $mobitel = $data['mobitel'];
        $email = $data['email'];
        
        if((file_get_contents("http://scaluza.com/laravel/api/usporedi?telefon=" . $mobitel" .&email=" . $email)) != '0') {
            return redirect('register');
        }
        else {
            return User::create([
                'ime' => $data['ime'],
                'prezime' => $data['prezime'],
                'mobitel' => $data['mobitel'],
                'datum_rodenja' => $datumNew,
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }
    }
}
