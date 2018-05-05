@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')


          <!-- /.row -->


<div class="box">
        <div class="box-header">
          <h3 class="box-title">Liste des Factures</h3>
          <h3 class="box-title pull-right">
                        <div class="box-tools ">
                            <a href="{{route('factures.create')}}" class="btn btn-primary btn-xs"> <i class="fa fa-plus"></i> Nouvelle Facture</a>
                        </div>
                        </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                        <tr>
                            <th width="10%">Facture Numero</th>
                            <th width="10%">Statut</th>
                            <th width="10%">Patient</th>
                            <th width="10%">Date Emission</th>
                            <th width="10%" class="text-right">Total</th>


                        </tr>
                        </thead>
            <tbody>

              @foreach($factures as $facture)


            <tr>
              <td>
                <a href="{{ route('pdfviewfacture',['download'=>'pdf','facture_id'=>$facture->id,'patient_id'=>$facture->patient_id]) }}" >
                {{$facture->id}}</a></td>
              <td>@switch($facture->status)
              @case(0)
              A Payer
              @break
              @case(1)
              Partiellement Paye
              @break
              @case(2)
              Paye
              @break
              @case(3)
              Trop paye
              @break
          @endswitch</td>
              <td><a href="{{ route('patients.show',['id'=>$facture->patient_id])}} "</a>
                {{$patients[$facture->patient_id-1]->nom }} {{$patients[$facture->patient_id-1]->prenom }}</td>
              <td>{{$facture->created_at}}</td>
              <td>{{$facture->total}}</td>



            </tr>
            @endforeach

            </tbody>
            <tfoot>
              <tr>
                  <th width="10%">Facture Numero</th>
                  <th width="10%">Statut</th>
                  <th width="10%">Patient</th>
                  <th width="10%">Date Emission</th>
                  <th width="10%" class="text-right">Total</th>

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
