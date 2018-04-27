@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')


   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Profil Patient
     </h1>
     <ol class="breadcrumb">
       <li><a href=""><i class="fa fa-dashboard"></i> Accueil</a></li>
       <li><a href="">Patients</a></li>
       <li class="active">{{$patient->nom}}</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <div class="row">
       <div class="col-md-3">

         <!-- Profile Image -->
         <div class="box box-primary">
           <div class="box-body box-profile">
             @if (($patient->sexe) == 'H')

                  <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-male"></i></div>
                @else
                  <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-female"></i></div>
                @endif

             <h3 class="profile-username text-center">{{$patient->nom}} {{$patient->prenom}}</h3>

             <p class="text-muted text-center">{{$patient->metier}}</p>

             <ul class="list-group list-group-unbordered">
               <li class="list-group-item">
                 <b>Date de Naissance</b> <a class="pull-right">{{$patient->naissance}}</a>
               </li>
               <li class="list-group-item">
                 <b>Tel Fixe</b> <a class="pull-right">{{$patient->telfixe}}</a>
               </li>
               <li class="list-group-item">
                 <b>Tel Mobile</b> <a class="pull-right">{{$patient->telmobile}}</a>
               </li>
               <li class="list-group-item">
                 <b>Courriel</b> <a href="mailto:{{$patient->mail}}" class="pull-right">{{$patient->mail}}</a>
               </li>
               <li class="list-group-item">
                 <b>Medecin Traitant</b> <a class="pull-right">{{$patient->medecintraitant}}</a>
               </li>
               <li class="list-group-item">
                 <b>Numero SS</b> <a class="pull-right">{{$patient->numero_ss}}</a>
               </li>
               <li class="list-group-item">
                 <b>Mutuelle</b> <a class="pull-right">{{$patient->mutuelle}}</a>
               </li>
             </ul>


           </div>
           <!-- /.box-body -->

           <div class="box-header with-border">
             <h3 class="box-title">Infos Supplementaires</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body" data-toggle="tooltip" title="Dernier rendez-vous enregistre">
             <strong><i class="fa fa-clock-o margin-r-5"></i> Rendez-Vous</strong>

             <p class="text-muted">
               @if(is_null($eventpatient))

               @else
               @foreach($eventpatient as $ep)
                      {{$ep->start_date}}
                   @endforeach
                   @endif

             </p>

             <hr>
             <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>

             <p class="text-muted">
               {{$patient->addresse}}
             </p>

             <hr>

             <strong><i class="fa fa-pencil margin-r-5"></i> Allergies</strong>

             <p>
               @if ($patient->allergies != "")
                  @foreach(explode(' ', $patient->allergies) as $allerg)

                    <span class="label label-danger">{{$allerg}}</span>
                  @endforeach
               @endif

             </p>

             <hr>
             <div contenteditable="false" id="NotesContent">
             <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

             <p>{{$patient->notes}}</p>
             </div>
           </div>
           <!-- /.box-body -->
           <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ModalEdit" data-numeross="{{$patient->numero_ss}}" data-mutuelle="{{$patient->mutuelle}}" data-patientid="{{$patient->id}}" data-notes="{{$patient->notes}}" data-allergies="{{$patient->allergies}}" data-nom="{{$patient->nom}}" data-prenom="{{$patient->prenom}}" data-naissance="{{$patient->naissance}}" data-addresse="{{$patient->addresse}}" data-telfixe="{{$patient->telfixe}}" data-telmobile="{{$patient->telmobile}}" data-mail="{{$patient->mail}}" data-sexe="{{$patient->sexe}}" data-medecintraitant="{{$patient->medecintraitant}}"><b>Modifier</b></a>
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->
       <div class="col-md-9">
         <div class="nav-tabs-custom">
           <ul class="nav nav-tabs">

             <li class="active"><a href="#consultations" data-toggle="tab">Historique</a></li>
             <li><a href="#nvlconsult" data-toggle="tab">Nvlle Consultation</a></li>
             <li><a href="#documents" data-toggle="tab">Documents</a></li>
             <li><a href="#plus" data-toggle="tab">Plus</a></li>


           </ul>
           <div class="tab-content">

             <!-- /.tab-pane -->
             <div class="active tab-pane" id="consultations">
               <div>
                 <a href="{{ route('pdfview',['download'=>'pdf','patient_id'=>$patient->id]) }}">
                 <button class="btn btn-default">
                 PDF Consultations
               </button>
               </a>


                 <a href="{{ route('pdfviewordonnances',['download'=>'pdf','patient_id'=>$patient->id]) }}">
                 <button class="btn btn-default">
                 PDF Ordonnances
               </button>
               </a>
               <hr>
               </div>
               <!-- The timeline -->
               <ul class="timeline">
                 <!-- timeline time label -->

                 @foreach ( $fil as $fi)
                 <li class="time-label">
                       <span class="bg-red">
                         {{ Carbon\Carbon::parse($fi->created_at)->format('d-M-Y ') }}

                       </span>
                 </li>
                 <!-- /.timeline-label -->
                 <!-- timeline item -->
                 <li>
                   <i class="fa fa-stethoscope bg-blue"></i>
                   <div class="timeline-item">
                   <div class=" box box-default collapsed-box">
                     <div class="box-header with-border">
                       <h3 class="box-title">Consultation : {!!html_entity_decode($fi->titre_cons)!!}</h3>

                       <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                         </button>
                       </div>
                       <!-- /.box-tools -->
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                       <div class="timeline-item">
                         <span class="time"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($fi->created_at)->format('H:i') }}</span>

                         <div class="timeline-body">
                           {!!html_entity_decode($fi->details_consultation)!!}

                           <span class="time"><i class="fa  fa-money"></i> <strong>Tarif : {{$fi->tarif}}</strong></span>
                         </div>
                         <div class="timeline-footer">
                           <a href="{{ route('pdfviewuneconsult',['download'=>'pdf','consult_id'=>$fi->id,'patient_id'=>$patient->id]) }}" class="btn btn-primary btn-xs">PDF</a>
                           <a class="btn btn-danger btn-xs">Effacer</a>
                         </div>

                       </div>
                     </div>
                     <!-- /.box-body -->
                   </div>
                 </div>
                 </li>
                 <!-- END timeline item -->
                 @if(($fi->ordo_presente) == '1')
                 <li>
                   <i class="fa fa-envelope-o bg-blue"></i>

                   <div class="timeline-item">
                     <div class="box box-default collapsed-box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Ordonnance : {!!html_entity_decode($fi->titre)!!}</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                         <span class="time"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($fi->created_at)->format('H:i') }}</span>

                         <div class="timeline-body">
                           {!!html_entity_decode($fi->details_ordonnance)!!}

                         </div>
                       <div class="timeline-footer">
                           <a href="{{ route('pdfviewuneordonnance',['download'=>'pdf','ord_id'=>$fi->id,'patient_id'=>$patient->id]) }}" class="btn btn-primary btn-xs">PDF</a>
                           <a class="btn btn-danger btn-xs">Effacer</a>
                         </div>
                       </div>
                       <!-- /.box-body -->
                     </div>

                   </div>
                 </li>
                 @endif
                 <!-- END timeline item -->
                    @endforeach
                 <li>
                   <i class="fa fa-clock-o bg-gray"></i>
                 </li>
               </ul>
             </div>



             <div class="tab-pane" id="documents">
               <!-- The timeline -->
               <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
             </div>
             <!-- /.tab-pane -->


             <div class="tab-pane" id="plus">
               <!-- Post -->
               <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">


                     <div class="box box-default collapsed-box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Devis</h3>
                         <div class="box-tools pull-right">
                           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                         </div><!-- /.box-tools -->
                       </div><!-- /.box-header -->
                       <div class="box-body">
                         The body of the box
                       </div><!-- /.box-body -->
                     </div><!-- /.box -->
                   </div>

                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="box box-default collapsed-box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Factures</h3>
                         <div class="box-tools pull-right">
                           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                         </div><!-- /.box-tools -->
                       </div><!-- /.box-header -->
                       <div class="box-body">
                         The body of the box
                       </div><!-- /.box-body -->
                     </div><!-- /.box -->

                   </div>

                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="box box-default collapsed-box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Consentements</h3>
                         <div class="box-tools pull-right">
                           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                         </div><!-- /.box-tools -->
                       </div><!-- /.box-header -->
                       <div class="box-body">
                         The body of the box
                       </div><!-- /.box-body -->
                     </div><!-- /.box -->

                   </div>

                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="box box-default collapsed-box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Demandes d'agrement prealable</h3>
                         <div class="box-tools pull-right">
                           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                         </div><!-- /.box-tools -->
                       </div><!-- /.box-header -->
                       <div class="box-body">
                         The body of the box
                       </div><!-- /.box-body -->
                     </div><!-- /.box -->

                   </div>

               </div>

               <!-- /.post -->

               <!-- Post -->

               <!-- /.post -->
             </div>




<!-- Nouvelle Ordonnance-->



<!-- Nouvelle Consultation-->
             <div class="tab-pane" id="nvlconsult">
               <form class="form-horizontal" action="{{ route('consultations.store') }}" method="post">
                 {{ csrf_field() }}


          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Details Consultation</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
                 <div class="box-body">

                   <div class="form-group">
                     <strong><i class="fa  fa-clock-o margin-r-5"></i> Date : </strong>
                      {{$mytime = Carbon\Carbon::now()}}
                   </div>


                   <div class="form-group">
                     <input class="form-control" id="cons_patient_id" name="cons_patient_id" type="hidden" value="{{$patient->id}}">
                   </div>
                   <div class="form-group">
                     <input class="form-control" id="cons_user_id" name="cons_user_id" type="hidden" value="{{\Auth::user()->id}}">
                   </div>
                   <div class="form-group">
                     <input class="form-control" id="ord_consult_id" name="ord_consult_id" type="hidden" value="">
                   </div>
                   <div class="form-group">
                     <label class="control-label" for="titre">Motif</label>
                     <input class="form-control" id="titre_cons" name="titre_cons" type="text" />
                   </div>
                   <div class="form-group form-inline">

                     <label class="control-label" for="tarif">Tarif</label>
                     <input class="form-control" id="tarif" name="tarif" type="number" step="0.01" />

                     <label class="control-label"for="tpaiment"> Paiment</label>
                     <select for="tpaiment" name="tpaiment" class="form-control">
                       <option value="CB">CB</option>
                       <option value="liquide"> Liquide</option>
                       <option value="cheque">Cheque</option>
                       <option value="cmu">CMU</option>
                     </select>
                   </div>

                   <div class="form-group">
                     <textarea id="my-editor2" name="details_consultation" style="height: 300px" class="form-control">

                       <h1><u>Gestes medicaux</u></h1>

                       <ul>
                         <li>Auscultation classique</li>
                       </ul>
                     </textarea>
                     <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                     <script>
                     var options = {
                       filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                       filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                       filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                       filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                     };
                     </script>


                   </div>

                 </div>
               </div>
               <div class="box box-default collapsed-box">
                 <div class="box-header with-border">
                   <h3 class="box-title">Nouvelle Ordonnance</h3>

                   <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                     </button>
                   </div>
                   <!-- /.box-tools -->
                 </div>
                 <div  id="nvlordonnance">

                     <div class="box-body">
                       <div class="form-group">
                         <strong><i class="fa  fa-clock-o margin-r-5"></i> Date : </strong>
                          {{$mytime = Carbon\Carbon::now()}}
                       </div>
                       <div class="form-group">
                       <div class="col-sm-offset-1 col-sm-10">

                         <div class="custom-control custom-radio">
                           <input class="custom-control-input" type="radio" id="contactChoice1" name="ordo_presente" value="1">
                           <label class="custom-control-label" for="contactChoice1">Avec Ordonnance</label>
                          </div>

                          <div class="custom-control custom-radio">
                           <input class="custom-control-input" type="radio" id="contactChoice2" name="ordo_presente" value="0" checked="checked" >
                           <label class="custom-control-label" for="contactChoice2">Sans Ordonnance</label>
                         </div>

                       </div>
                     </div>
                       <div class="form-group">
                         <input class="form-control" id="cons_patient_id" name="ord_patient_id" type="hidden" value="{{$patient->id}}">
                       </div>
                       <div class="form-group">
                         <input class="form-control" id="cons_user_id" name="ord_user_id" type="hidden" value="{{\Auth::user()->id}}">
                       </div>
                       <div class="form-group">
                         <label class="control-label" for="titre">Ordonnance Type</label>
                         <input class="form-control" id="titre" name="titre" type="text" />
                       </div>

                       <div class="form-group">
                         <textarea id="my-editor" name="details_ordonnance" style="height: 300px" class="form-control">
                           <ul>
                             <li>Medicament un : trois fois par jour.</li>
                             <li>Medicament deux</li>
                             <li>Medicament trois</li>

                           </ul>
                         </textarea>
                         <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                         <script>
                         var options = {
                           filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                           filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                           filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                           filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                         };
                         </script>


                       </div>

                     </div>

                 </div>
               </div>

                 <div class="box-footer">
                   <div class="pull-right">
                     <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Valider</button>
                   </div>

                 </div>
               </form>
             </div>
             <!-- /.tab-pane -->
           </div>
           <!-- /.tab-content -->
         </div>
         <!-- /.nav-tabs-custom -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

   </section>
   <!-- /.content -->
   <!-- Modal Modifier PATIENTS -->

   <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
 <div class="modal-content">
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Modifier un Patient</h4>
   </div>
   <form id="formidifier" action="{{ route('patients.update', 'patient_id') }}" method="post">
             {{ csrf_field() }}
             {{method_field('patch')}}
   <div class="modal-body">



   @include('layouts.apatient')

   <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
     <button type="submit" class="btn btn-primary">Sauvegarder Changements</button>
   </div>
   </form>


 </div>
</div>
</div>

   <!-- Fin MODAL Modifier PATIENT -->



   <script>
   CKEDITOR.replace('my-editor', options);
   </script>
   <script>
   CKEDITOR.replace('my-editor2', options);
   </script>
@endsection


@section('js')
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>


@endsection
