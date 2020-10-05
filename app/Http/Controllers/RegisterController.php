<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() {
        $this->middleware('auth');
     }  
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nom' => 'bail|required',
            'prenom'=> 'bail|required',
            'tel'=> 'bail|required',
            'adresse'=> 'bail|required',
            'email' => 'bail|required|unique:users',
            'password' => 'bail|required|min:8|confirmed',
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $client = Client::create([
                'nom'=>request('nom'),
                'prenom'=>request('prenom'),
                'tel'=>request('tel'),
                'adresse'=>request('adresse'),
                'email'=>request('email'),
                'password'=>request('password'),
            ]);
            return Redirect::back()->with('succes','Enregistrer');
        }
    }
    protected function validateLogin(Request $request)
    {
       $validation = Validator::make($request->all(),[
            'email'=>'bail|required',
            'password'=>'bail|required',
        ]);
        if($validation->fails()){
             return redirect()->back()->withErrors($validation)->withInput();
        }else{
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
