<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$userid =  \Auth::user()->id ;

      //  $patients = \DB::table('patients')->where(function ($query) use ($userid) {
      //    $query->where('users_id', '=', $userid);
      //  })->get();

      //  $consultations = \DB::table('consultations')->where(function ($query) use ($userid) {
      //    $query->where('users_id', '=', $userid);
      //  })->get();

      //  return view('patients', compact('patients','consultations'));
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
        //
        \App\Consultations::create($request->all());
        return back();
    }


    public function pdfview(Request $request)

    {

      $userid =  \Auth::user()->id ;
      $patient = \App\Patient::findOrFail($request->patient_id);

      $docteur = \DB::table('docteurs')->where(function ($query) use ($userid) {
          $query->where('users_id', '=', $userid);
        })->get();


      $consultations = \DB::table('consultations')->where(function ($query) use ($userid,$patient) {
        $query->where('cons_user_id', '=', $userid)
        ->where('cons_patient_id','=',$patient->id);
      })->get();

  //    $items = \DB::table("consultations")
  //      ->where('cons_user_id',)
  //      ->get();

      view()->share('consultations',$consultations);
      view()->share('patient',$patient);
      view()->share('docteur',$docteur);



      if($request->has('download'))
      {

        $pdf = PDF::loadView('pdfview');

        return $pdf->download('Consultations.pdf');
    //return dd($patient->nom);

     }


    return view('pdfview');

    }

    public function pdfviewordonnances(Request $request)

    {

      $userid =  \Auth::user()->id ;
      $patient = \App\Patient::findOrFail($request->patient_id);

      $docteur = \DB::table('docteurs')->where(function ($query) use ($userid) {
          $query->where('users_id', '=', $userid);
        })->get();


      $ordonnances = \DB::table('ordonnances')->where(function ($query) use ($userid,$patient) {
        $query->where('ord_user_id', '=', $userid)
        ->where('ord_patient_id','=',$patient->id);
      })->get();

  //    $items = \DB::table("consultations")
  //      ->where('cons_user_id',)
  //      ->get();

      view()->share('ordonnances',$ordonnances);
      view()->share('patient',$patient);
      view()->share('docteur',$docteur);



      if($request->has('download'))
      {

        $pdf = PDF::loadView('pdfviewordonnances');

        return $pdf->download('Ordonnances.pdf');
    //return dd($patient->nom);

     }


    return view('pdfview');

    }


    public function pdfviewuneconsult(Request $request)

    {

      $userid =  \Auth::user()->id ;
      $cons_id =$request->consult_id;
      $patient = \App\Patient::findOrFail($request->patient_id);
    //  $consultation = \App\Consultations::where('cons_id',$cons_id)->firstOrFail();

    $docteur = \DB::table('docteurs')->where(function ($query) use ($userid) {
        $query->where('users_id', '=', $userid);
      })->get();


    $consultation = \DB::table('consultations')->where(function ($query) use ($cons_id) {
        $query->where('cons_id', '=', $cons_id);
      })->get();

  //    $items = \DB::table("consultations")
  //      ->where('cons_user_id',)
  //      ->get();

      view()->share('consultation',$consultation);
      view()->share('patient',$patient);
      view()->share('docteur',$docteur);



      if($request->has('download'))
      {

      $pdf = PDF::loadView('pdfviewuneconsult');

        return $pdf->download('Consultation.pdf');
    //return dd($patient->all());

     }


    return view('pdfviewuneconsult');

    }

    public function pdfviewuneordonnance(Request $request)

    {

      $userid =  \Auth::user()->id ;
      $ord_id =$request->ord_id;
      $patient = \App\Patient::findOrFail($request->patient_id);
    //  $consultation = \App\Consultations::where('cons_id',$cons_id)->firstOrFail();

    $docteur = \DB::table('docteurs')->where(function ($query) use ($userid) {
        $query->where('users_id', '=', $userid);
      })->get();


    $ordonnance = \DB::table('ordonnances')->where(function ($query) use ($ord_id) {
        $query->where('id', '=', $ord_id);
      })->get();

  //    $items = \DB::table("consultations")
  //      ->where('cons_user_id',)
  //      ->get();

      view()->share('ordonnance',$ordonnance);
      view()->share('patient',$patient);
      view()->share('docteur',$docteur);



      if($request->has('download'))
      {

      $pdf = PDF::loadView('pdfviewuneordonnance');

        return $pdf->download('Ordonnance.pdf');
    //return dd($patient->all());

     }


    return view('pdfviewuneordonnance');

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
