<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\PatientsExport;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function excel()
     {

       return Excel::download(new PatientsExport, 'Patients.xlsx');



     }


    public function index()
    {
        $userid =  \Auth::user()->id ;

        $patients = \DB::table('patients')->where(function ($query) use ($userid) {
          $query->where('users_id', '=', $userid);
        })->get();


        return view('patients', compact('patients'));
        //dd($patients);
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

    public function ajoutgeneral()
    {
        //
        return view('apatientgeneral');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
      activity()->log('Created new patient');
        \App\Patient::create($request->all());
        return back();
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
        $userid =  \Auth::user()->id ;
        $patient = \App\Patient::findOrFail($id);

        $consultations = \DB::table('consultations')->where(function ($query) use ($userid,$id) {
          $query->where('cons_user_id', '=', $userid)
          ->where('cons_patient_id','=',$id);
        })->get();

        $ordonnances = \DB::table('ordonnances')->where(function ($query) use ($userid,$id) {
          $query->where('ord_user_id', '=', $userid)
          ->where('ord_patient_id','=',$id);
        })->get();

        return view('patientprofil', compact('patient','consultations','ordonnances'));

       //return view('patientprofil', compact('patient'));
      //return dd($consultations->all());
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
        $patient = \App\Patient::findOrFail($request->patient_id);
        if ($patient){
          $patient->update($request->all());
        }
        activity()->log('Updated patient');
        return back();
      //  dd($request->all());
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
        // delete
        //$patient = \App\Patient::find($id);
      //  \App\Patient::delete($id);
      activity()->log('Destroyed patient');
        $file = \App\Patient::where('id', $id)->first(); // File::find($id)

        if($file) {

           $file->delete();
                  }
        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        //return Redirect::to('nerds');
        //$patient = \App\Patient::findOrFail($id);
        //\App\Patient::delete($id);
        return back();
        //dd($id);
    }
}
