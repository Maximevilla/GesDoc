<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\PatientsExport;
use Carbon;


class ChiffreaffairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function exceltout()
     {

       return Excel::download(new caExportTout, 'CATotal.xlsx');



     }

     public function indexjour()
     {
         $userid =  \Auth::user()->id ;

         $consultations = \DB::table('consultations')
         ->where(function ($query) use ($userid) {
           $query->where('cons_user_id', '=', $userid);
         })
         ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
         ->select('patients.nom', 'patients.prenom', 'consultations.titre','consultations.tarif','consultations.created_at')
         ->whereDay('consultations.created_at', '=', date('d'))
         ->get();




         return view('chiffreaffaires', compact('consultations'));
       //  dd($ca);
     }

     public function indexsemaine()
     {
         $userid =  \Auth::user()->id ;

         $consultations = \DB::table('consultations')
         ->where(function ($query) use ($userid) {
           $query->where('cons_user_id', '=', $userid);
         })
         ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
         ->select('patients.nom', 'patients.prenom', 'consultations.titre','consultations.tarif','consultations.created_at')
         ->whereBetween('consultations.created_at', [
           Carbon\Carbon::parse('last monday')->startOfDay(),
           Carbon\Carbon::parse('next friday')->endOfDay(),
         ])
         ->get();




         return view('chiffreaffaires', compact('consultations'));
       //  dd($ca);
     }

     public function indexmois()
     {
         $userid =  \Auth::user()->id ;

         $consultations = \DB::table('consultations')
         ->where(function ($query) use ($userid) {
           $query->where('cons_user_id', '=', $userid);
         })
         ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
         ->select('patients.nom', 'patients.prenom', 'consultations.titre','consultations.tarif','consultations.created_at')
         ->whereMonth('consultations.created_at', '=', date('m'))
         ->get();




         return view('chiffreaffaires', compact('consultations'));
       //  dd($ca);
     }


     public function indexannee()
     {
         $userid =  \Auth::user()->id ;

         $consultations = \DB::table('consultations')
         ->where(function ($query) use ($userid) {
           $query->where('cons_user_id', '=', $userid);
         })
         ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
         ->select('patients.nom', 'patients.prenom', 'consultations.titre','consultations.tarif','consultations.created_at')
         ->whereYear('consultations.created_at', '=', date('Y'))
         ->get();




         return view('chiffreaffaires', compact('consultations'));
       //  dd($ca);
     }

    public function index()
    {
        $userid =  \Auth::user()->id ;

        $consultationsmois = \DB::table('consultations')
        ->where(function ($query) use ($userid) {
          $query->where('cons_user_id', '=', $userid);
        })
        ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
        ->select(\DB::raw('MONTH(consultations.created_at) as mois'),\DB::Raw('sum(consultations.tarif) as Sum'))
        ->groupBy('mois') // grouping by years
        //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        ->get();

        $consultations = \DB::table('consultations')
        ->where(function ($query) use ($userid) {
          $query->where('cons_user_id', '=', $userid);
        })
        ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
        ->select(\DB::raw('YEAR(consultations.created_at) as year'),\DB::Raw('sum(consultations.tarif) as Sum'))
        ->groupBy('year') // grouping by years
        //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        ->get();




        return view('chiffreaffaires', compact('consultations','consultationsmois'));
        //dd($consultations);
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
