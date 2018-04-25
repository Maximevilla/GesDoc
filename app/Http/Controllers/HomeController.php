<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
        activity()->log('Creation new docteur');
        return view('creadocteur');
      }
      else{

        $fromDate = Carbon::today();
        $toDate = Carbon::tomorrow();

        $patientsjour =\App\Event::where('eve_user_id',$userid) ->whereBetween('created_at', array($fromDate->toDateTimeString(), $toDate->toDateTimeString()) )->count();

        activity()->log('Opened admin page');

        return view('admin', compact('docteur','patientsjour'));
       //dd($patientsjour);
      }

    }
}
