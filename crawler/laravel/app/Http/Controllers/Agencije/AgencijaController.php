<?php

namespace App\Http\Controllers\Agencije;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgencijaController extends Controller
{

    public function __construct(Request $request){
        $this->request = $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //return "<h1>Dobrodošli u Agencije API</h1><h2>Korištenje:</h2><br><strong>Prikaz tel brojeva: GET:</strong> <i>/api/show</i><br><strong>Opis spremanja GET:</strong> <i>/api/create</i> <br><strong>Spremanje tel broja: POST: </strong><i>/api?telefon=*broj*</i><br><strong>Spremanje emal adrese: POST:</strong> <i>/api?email=*email*</i><br><strong>Upit o postojanju broja i/ili maila: GET: </strong><i>/api/usporedi?telefon=*broj*&email=*email*</i>";
        return '<table class="tg">
          <tr>
            <th class="tg-yw4l">Opis</th>
            <th class="tg-baqh">Metoda:</th>
            <th class="tg-yw4l">URL</th>
          </tr>
          <tr>
            <td class="tg-yw4l">Prikaz tel brojeva:</td>
            <td class="tg-baqh">GET</td>
            <td class="tg-yw4l">/api/show</td>
          </tr>
          <tr>
            <td class="tg-yw4l">Opis spremanja</td>
            <td class="tg-baqh">GET</td>
            <td class="tg-yw4l">/api/create</td>
          </tr>
          <tr>
            <td class="tg-yw4l">Spremanje tel broja</td>
            <td class="tg-baqh">POST</td>
            <td class="tg-yw4l">/api?telefon=*broj*</td>
          </tr>
          <tr>
            <td class="tg-yw4l">Spremanje emal adrese</td>
            <td class="tg-baqh">POST</td>
            <td class="tg-yw4l">/api?email=*email*</td>
          </tr>
          <tr>
            <td class="tg-yw4l">Upit o postojanju broja i/ili maila</td>
            <td class="tg-baqh">GET</td>
            <td class="tg-yw4l">/api/usporedi?telefon=*broj*&amp;email=*email*</td>
          </tr>
        </table>';
    }

    /**
     * Show the form for creating a new resource.
     * @param
     * @return Response
     */
    public function create()
    {
        
         echo "Syntax: POST: /api?telefon=*telefon*&id_agencija=*id*<br>/api?email=*email*&id_agencija=*id*";
         
    }

    /**
     * Store a newly created resource in storage.
     * @param 
     * @return Response
     */
    public function store()
    {
        echo "Out";
       if($this->request->input('telefon')!=NULL)
       {    
            $telefon = $this->request->input('telefon');
            $id_agencija = $this->request->input('id_agencija', NULL);
            DB::table('telefon_agencija')->insert(['telefon' => $telefon, 'id_agencija' => $id_agencija]);
       }
       else
       {
            $email = $this->request->input('email');
            $id_agencija = $this->request->input('id_agencija', NULL);
            DB::table('email_agencija')->insert(['email' => $email, 'id_agencija' => $id_agencija]);
       }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if($id==0)
        {
            $data = array();
            $data['telefon'] = DB::table('telefon_agencija')->get();
            $data['email'] = DB::table('email_agencija')->get();
            
           

            return response()->json($data);
            
        }
       
    }

    public function usporedi()
    {
        $telefon = $this->request->input('telefon');
        $email = $this->request->input('email');
        $brojTelefona = DB::table('telefon_agencija')->where('telefon', '=', $telefon)->count();
        $brojEmailova = DB::table('email_agencija')->where('email', '=', $email)->count();
        //$result1 = DB::table('telefon_agencija')->where('telefon', '=', $telefon)->count();
        return response()->json($brojEmailova+$brojTelefona);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}