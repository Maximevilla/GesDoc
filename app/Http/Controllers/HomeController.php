<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userid =  \Auth::user()->id ;




    $docteur= \App\Docteur::where('users_id', '=', $userid)->first();
      if ($docteur === null) {
        // user doesn't exist
        return view('creadocteur');
      }
      else{



        return view('admin', compact('docteur','patientsjours'));
       //dd($patientsjour);
      }

    }
}
