<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
  //Route::get('/admin', function () {
    //   return view('admin');});


    Route::get('/openmedica', function() {
    return redirect()->to('https://www.open-medicaments.fr/');
});

Route::get('/amelipro', function() {
return redirect()->to('https://espacepro.ameli.fr');
});
  //  Route::resource('medica','MedicamentsController');
    Route::get('aevent','EventController@aevent');
    Route::get('admin',array('as'=>'admin','uses'=>'DocteursController@index'));
    Route::post('admin',array('as'=>'admin.store','uses'=>'DocteursController@store'));


    Route::get('pdfviewuneordonnance',array('as'=>'pdfviewuneordonnance','uses'=>'ConsultationsController@pdfviewuneordonnance'));
    Route::get('pdfviewordonnances',array('as'=>'pdfviewordonnances','uses'=>'ConsultationsController@pdfviewordonnances'));
    Route::get('pdfviewuneconsult',array('as'=>'pdfviewuneconsult','uses'=>'ConsultationsController@pdfviewuneconsult'));
  Route::get('pdfview',array('as'=>'pdfview','uses'=>'ConsultationsController@pdfview'));
  Route::get('ajoutgeneral', ['as' => 'ajoutgeneral', 'uses' => 'PatientsController@ajoutgeneral']);

  Route::get('patient/{id}',['as'=>'patient.show', 'uses' => 'PatientsController@show'])-> where('id', '[0-9]+');
  Route::get('patient/{id}',['as'=>'patient.destroy', 'uses' => 'PatientsController@destroy'])-> where('id', '[0-9]+');
  Route::resource('patients', 'PatientsController');
  Route::resource('consultations','ConsultationsController');
  Route::resource('ordonnances', 'OrdonnancesController');

  Route::resource('calendar', 'CalendarController@index');
  Route::get('events', 'EventController@index');
   Route::resource('events', 'EventController');

    Route::resource('document', 'DocumentController');



});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/patients', 'PatientsController@index')->name('patients');
