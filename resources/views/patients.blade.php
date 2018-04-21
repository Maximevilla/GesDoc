@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')

    <div class="row">
            <div class="col-md-3">
              <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Patients</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                  <button class="btn" data-toggle="modal" data-target="#ModalAjout">Ajouter</button>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">

              <!-- /.box -->
            </div>

            <!-- /.col -->

            <!-- /.col -->
          </div>
          <!-- /.row -->


<div class="box">
        <div class="box-header">
          <h3 class="box-title">Liste des Patients</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Naissance</th>
              <th>Addresse</th>
              <th>Tel Fixe</th>
              <th>Tel Mobile</th>
              <th>Mail</th>
              <th>Sexe</th>
              <th>Medecin Traitant</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>

              @foreach($patients as $pat)


            <tr>
              <td><a href="{{ route('patients.show',['id'=>$pat->id])}}"</a>{{$pat->nom}}</td>
              <td>{{$pat->prenom}}</td>
              <td>{{$pat->naissance}}</td>
              <td>{{$pat->addresse}}</td>
              <td>{{$pat->telfixe}}</td>
              <td>{{$pat->telmobile}}</td>
              <td>{{$pat->mail}}</td>
              <td>{{$pat->sexe}}</td>
              <td>{{$pat->medecintraitant}}</td>
              <td>

                  <button type="button" class="btn btn-block btn-sm btn-default" data-patientid="{{$pat->id}}" data-notes="{{$pat->notes}}" data-allergies="{{$pat->allergies}}" data-nom="{{$pat->nom}}" data-prenom="{{$pat->prenom}}" data-naissance="{{$pat->naissance}}" data-addresse="{{$pat->addresse}}" data-telfixe="{{$pat->telfixe}}" data-telmobile="{{$pat->telmobile}}" data-mail="{{$pat->mail}}" data-sexe="{{$pat->sexe}}" data-medecintraitant="{{$pat->medecintraitant}}"
                    data-toggle="modal" data-target="#ModalEdit" data-toggle="tooltip" title="Editer"><i class="fa fa-edit"></i></button>
                  <a href="{{ route('patient.destroy',['id'=>$pat->id])}}"><button type="button" class="btn btn-block btn-sm  btn-default" data-patientid="{{$pat->id}}"  data-toggle="tooltip" title="Supprimer"><i class="fa fa-trash"></i></button>
</a>


             </td>
            </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Naissance</th>
              <th>Addresse</th>
              <th>Tel Fixe</th>
              <th>Tel Mobile</th>
              <th>Mail</th>
              <th>Sexe</th>
              <th>Medecin Traitant</th>
              <th>Actions</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

        <!-- Modal AJOUT PATIENTS -->

        <div class="modal fade" id="ModalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Ajouter un Patient</h4>
        </div>
        <form action="{{ route('patients.store') }}" method="post">
                  {{ csrf_field() }}
        <div class="modal-body">

        @include('layouts.apatient')

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </form>

      </div>
    </div>
  </div>

        <!-- Fin MODAL AJOUT PATIENT -->

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

        <!-- Modal Delete PATIENTS -->

        <div class="modal fade" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Supprimer</h4>
        </div>
        <form action="{{ route('patients.destroy', 'patientid') }}" method="post">

          <input type="hidden" name="_method" value="delete" />
                  {{ csrf_field() }}
        <div class="modal-body">
          <input name="users_id" id="users_id" type="hidden" value="{{\Auth::user()->id}}">
          <input name="patient_id" id="patient_id" type="hidden" value="">
          <div class="alert alert-info" role="alert">
            <h4>Valider la suppression ?</h4>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
          <button type="submit" class="btn btn-success">Oui</button>
        </div>
        </form>

      </div>
      </div>
      </div>

        <!-- Fin MODAL Delete PATIENT -->


@endsection

@section('js')
<script>
$( document ).ready(function() {


$(function () {
 $('#example1').DataTable()
 $('#example2').DataTable({
   'paging'      : true,
   'lengthChange': false,
   'searching'   : false,
   'ordering'    : true,
   'info'        : true,
   'autoWidth'   : false
 })
})
});
</script>

@endsection
