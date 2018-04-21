<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Carbon\Carbon;
use App\EventModel; 

class EventController extends Controller
{
    //
    public function store(Request $request)
    {
      $userid =  \Auth::user()->id ;
      $r = $request->start_date;
      $start_date = Carbon::createFromFormat('m/d/Y H:i', $r);
      $end_date =$start_date;
      $end_date->addMinutes($request->duree);

      $newevent = new Event;

        $newevent->titre= $request->titre;
        $newevent->start_date= Carbon::createFromFormat('m/d/Y H:i', $r);
        $newevent->end_date= $end_date;
        $newevent->eve_patient_id= $request->eve_patient_id;
        $newevent->eve_user_id= $userid;

        $newevent->save();
        //\App\Event::create($request->all());
        return back();
        //dd($newevent);
    }

    public function aevent()
            {
              $userid =  \Auth::user()->id ;
              $event = \App\Event::all();

              $patients = \DB::table('patients')->where(function ($query) use ($userid) {
                $query->where('users_id', '=', $userid);
              })->get();

              foreach ($event as $eve) {
                $start_timestamp = Carbon::createFromFormat('Y-m-d H:i:s', $eve->start_date);
                $end_timestamp = Carbon::createFromFormat('Y-m-d H:i:s', $eve->end_date);

                 $events[] = \Calendar::event(
                 $eve->titre, //event title
                 $eve->name,
                 $start_timestamp,//->toTimeString(), //start time (you can also use Carbon instead of DateTime)
                 $end_timestamp,//->toTimeString(), //end time (you can also use Carbon instead of DateTime)
                 $eve->id, //optionally, you can specify an event ID
                 [
 		                'url' => 'patients/'.($eve->eve_patient_id),
 		                  //any other full-calendar supported parameters
 	                   ]
                 );
              }
                $calendar = Calendar::addEvents($events)
                ->setOptions([
                'FirstDay' => 1,
                'contentheight' => 650,
                'editable' => true,
                'allDay' => false,
                'aspectRatio' => 1,
                'slotLabelFormat' => 'HH:mm:ss',
                'timeFormat' => 'H(:mm)',





                ])->setCallbacks([]);
                //return dd($calendar);
                return view('aevent', compact('calendar','patients'));

                //return view('aevent');
            }

    public function index()
            {
              //  $events = [];
                //$data = Event::all();
                global $events;
                $event = \App\Event::all();
                // ----------Pour multiples users----
              //  $userid =  \Auth::user()->id ;
              //  $event = \DB::table('events')->where(function ($query) use ($userid) {
              //    $query->where('users_id', '=', $userid);
            //    })->get();

            //    return view('patients', compact('patients'));
            ///---------------------------------------------------

              foreach ($event as $eve) {
                $start_timestamp = Carbon::createFromFormat('Y-m-d H:i:s', $eve->start_date);
                $end_timestamp = Carbon::createFromFormat('Y-m-d H:i:s', $eve->end_date);


                 $events[] = \Calendar::event(
                 $eve->titre, //event title
                 $eve->name,
                 $start_timestamp,//->toTimeString(), //start time (you can also use Carbon instead of DateTime)
                 $end_timestamp,//->toTimeString(), //end time (you can also use Carbon instead of DateTime)
                 $eve->id, //optionally, you can specify an event ID
                 [
 		                'url' => 'patients/'.($eve->eve_patient_id),
 		                  //any other full-calendar supported parameters
 	                   ]
                 );
              }
                $calendar = Calendar::addEvents($events)
                ->setOptions([
                'FirstDay' => 1,
                'contentheight' => 650,
                'editable' => true,
                'allDay' => false,
                'aspectRatio' => 1,
                'slotLabelFormat' => 'HH:mm:ss',
                'timeFormat' => 'H(:mm)',





                ])->setCallbacks([]);
                //return dd($calendar);
                return view('calendar', compact('calendar'));
            }
}
