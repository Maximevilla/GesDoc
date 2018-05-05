<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Input;

class FacturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userid =  \Auth::user()->id ;

        $factures = \DB::table('factures')->where(function ($query) use ($userid) {
          $query->where('users_id', '=', $userid);
        })

        ->get();

        $patients = \DB::table('patients')->where(function ($query) use ($userid) {
          $query->where('users_id', '=', $userid);
        })
        ->select('id','nom','prenom')->get();
        //dd($factures);
        return view('factures', compact('factures','patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userid =  \Auth::user()->id ;
        $patients = \DB::table('patients')->where(function ($query) use ($userid) {
          $query->where('users_id', '=', $userid);
        })->get();

        return view('createfacture',compact('patients'));
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
        $input = $request->all();
        $nbr_val = count($input);

        $patient_id = $request->client;

        $userid =  \Auth::user()->id ;
        $patient = \App\Patient::findOrFail($patient_id);

        $facture = new \App\Facture();
        //On left field name in DB and on right field name in Form/view
        $facture->users_id = $userid;
        $facture->patient_id = $request->input('client');
        $facture->currency = $request->input('currency');
        $facture->status = $request->input('status');
        $facture->notes = $request->input('notes');
        $facture->terms = $request->input('terms');
        $facture->discount = $request->input('discount');
        $facture->save();
        $insertedid = $facture->id;

        $totalfacture = 0;

        $factureline = new \App\Factureline();
        $factureline->facture_id = $insertedid;
        $factureline->item_name = $request->input('item_name');
        $factureline->item_description = $request->input('item_description');
        $factureline->quantity = $request->input('quantity');
        $factureline->due_date = $request->input('due_date');
        $factureline->tax = $request->input('tax');
        $factureline->price = $request->input('price');
        $factureline->save();

        $subtotal=($factureline->quantity) * ($factureline->price);
        $subtax=($factureline->quantity) * ($factureline->price)*($factureline->tax)/100;

        $totalfacture = $subtotal+$subtax-$facture->discount;
        if ($nbr_val>15) {
          // code...
          for ($x = 0; $x < $nbr_val-15; $x=$x+5) {


            $y=1;
          $factureline = new \App\Factureline();
          $factureline->facture_id = $insertedid;
          $factureline->item_name = $input[('item_name'.(string)$y)];
          $factureline->item_description = $request->input('item_description'.(string)$y);
          $factureline->quantity = $request->input('quantity'.(string)$y);
          $factureline->due_date = $request->input('due_date'.(string)$y);
          $factureline->tax = $request->input('tax'.(string)$y);
          $factureline->price = $request->input('price'.(string)$y);
          $factureline->save();
          $totalfacture = $totalfacture+((($factureline->quantity) * ($factureline->price))+((($factureline->quantity) * ($factureline->price)*($factureline->tax) /100)));
          $y=$y+1;
          }

        }
        \DB::transaction(function () use ($insertedid,$totalfacture){
          \DB::table('factures')->where('id',$insertedid)->update(['total' => $totalfacture]);


});
        return redirect()->route('factures.index');
        //dd($insertedid);

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
        $facture = \App\Facture::where('id', '=', $id)->firstOrFail();
        $facture->destroy();
        return back();
    }


  public function pdfviewfacture(Request $request)

  {

    $userid =  \Auth::user()->id ;
    $patient = \App\Patient::findOrFail($request->patient_id);

    $docteur = \DB::table('docteurs')->where(function ($query) use ($userid) {
      $query->where('users_id', '=', $userid);
    })->get();


    $facture= \DB::table('factures')->where(function ($query) use ($request) {
      $query->where('id', '=', $request->facture_id);
    })->get();

    $facturelines= \DB::table('facturelines')->where(function ($query) use ($request) {
      $query->where('facture_id', '=', $request->facture_id);
    })->get();

    view()->share('facture',$facture);
    view()->share('facturelines',$facturelines);
    view()->share('patient',$patient);
    view()->share('docteur',$docteur);


    if($request->has('download'))
    {

    $pdf = PDF::loadView('pdfviewfacture');

    return $pdf->download('facture.pdf');
//return dd($facturelines);

 }


return view('pdfview');

}
}
