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

     public function excelparjour()
     {

       return Excel::download(new caExportTout, 'CATotal.xlsx');



     }


    public function index()
    {
        $userid =  \Auth::user()->id ;

        $consultationsjour = \DB::table('consultations')
        ->where(function ($query) use ($userid) {
          $query->where('cons_user_id', '=', $userid);
        })
        ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
        ->select(\DB::raw("CONCAT_WS('-',DAY(consultations.created_at),MONTH(consultations.created_at),YEAR(consultations.created_at)) as daymonthyear"),\DB::Raw('sum(consultations.tarif) as Sum'))
        ->groupBy('daymonthyear')
        ->get();

        $consultationsmois = \DB::table('consultations')
        ->where(function ($query) use ($userid) {
          $query->where('cons_user_id', '=', $userid);
        })
        ->join('patients', 'consultations.cons_patient_id', '=', 'patients.id')
        ->select(\DB::raw("CONCAT_WS('-',MONTH(consultations.created_at),YEAR(consultations.created_at)) as monthyear"),\DB::Raw('sum(consultations.tarif) as Sum'))
        ->groupBy('monthyear') // grouping by years
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




        return view('chiffreaffaires', compact('consultations','consultationsmois','consultationsjour'));
        //dd($consultationsjour);
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
