@extends('adminlte::page')

@section('title', 'GesDoc')

@section('css')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css"/>



@endsection

@section('content_header')
<section class="content-header">
  <h1>
    Nouveau Rendez-Vous
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Accueil</a></li>
    <li><a href="">Rendez-Vous</a></li>
    <li class="active">Nouveau</li>
  </ol>
</section>
   <section class="content"
<div class="container-fluid">
<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12">
         <div class="box box-primary">
           <div class="box-header">
             <h3 class="box-title">Ajouter</h3>
           </div>
           <div class="box-body">
             <form action="{{route('events.store')}}" method="post">
               {{ csrf_field() }}

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="titre">Type Consultation</label>
                 <div class="input-group date">
                 <input type="text" id="titre" name="titre" value="" />
               </div>
               </div>

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="eve_patient_id">Nom Patient</label>
                 <div class="input-group date">
                   <select class="selectpatients" name="eve_patient_id">
                     @foreach($patients as $pat)
                     <option value="{{$pat->id}}">{{$pat->nom}} {{$pat->prenom}}</option>
                     @endforeach
                   </select>
               </div>
               </div>

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="datetimepicker">Date</label>
                 <div class="input-group date">
                 <input type="text" data-provide="datetimepicker" id="datetimepicker" name="start_date" value="" />
               </div>
               </div>

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="duree">Duree Prevue (minutes)</label>
                 <div class="input-group date">
                 <input type="number"  id="duree" name="duree" value="30" />
               </div>
               </div>

               <div class="form-group">

               </div>

               <div class="form-group"> <!-- Submit button -->
                 <button class="btn btn-primary " name="submit" type="submit">Nouveau</button>
               </div>
              </form>

           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
         <div class="box box-primary">
           <div class="box-header">
             <h3 class="box-title">Nouveau Patient</h3>
           </div>
           <div class="box-body">
             <form action="{{route('patients.store')}}" method="post">
               {{ csrf_field() }}
               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="nom">Nom</label>
                 <div class="input-group date">
                 <input type="text" id="nom" name="nom" value="" />
               </div>
               </div>

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="prenom">Prenom</label>
                 <div class="input-group date">
                 <input type="text" id="prenom" name="prenom" value="" />
               </div>
               </div>

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="telfixe">Tel Fixe</label>
                 <div class="input-group date">
                 <input type="text" id="telfixe" name="telfixe" value="" />
               </div>
               </div>

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="telmobile">Tel Mob</label>
                 <div class="input-group date">
                 <input type="text" id="telmobile" name="telmobile" value="" />
               </div>
               </div>

               <div class="form-group"> <!-- Date input -->
                 <label class="control-label" for="addresse">Adresse</label>
                 <div class="input-group date">
                 <input type="text" id="addresse" name="addresse" value="" />
               </div>
               </div>

               <input  id="users_id" type="hidden" name="users_id" value="{{\Auth::user()->id}}" />
               <div class="form-group"> <!-- Submit button -->
                 <button class="btn btn-primary " name="submit" type="submit">Ajouter</button>
               </div>
              </form>

           </div>
           <!-- /.box-body -->
         </div>
  <!-- Form code begins -->

   <!-- Form code ends -->

  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="panel panel-default">
          <div class="panel-heading">Agenda</div>

<div class="panel-body">
              {!! $calendar->calendar() !!}
          </div>
      </div>
  </div>
</div>
</div>
</section>


@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>



{!! $calendar->script() !!}

<script>
</script>
@endsection
