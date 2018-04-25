@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')

<section>
    <div class="row">
      <div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Periodes Consultations</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="{{ route('chiffreaffaires.index') }}"><button class="btn btn-primary" >Tout</button></a>
              <a href="{{ route('chiffreaffairesannee') }}"><button class="btn btn-primary" >Annee</button></a>
              <a href="{{ route('chiffreaffairesmois') }}"><button class="btn btn-primary" >Mois</button></a>
              <a href="{{ route('chiffreaffairessemaine') }}"><button class="btn btn-primary" >Semaine</button></a>
              <a href="{{ route('chiffreaffairesjour') }}"><button class="btn btn-primary" >Jour</button></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Excel</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <a href="{{ route('patients.excel') }}"><button class="btn btn-primary" >Excel tout</button></a>
                <a href="{{ route('patients.excel') }}"><button class="btn btn-primary" >Excel Annee</button></a>
                <a href="{{ route('patients.excel') }}"><button class="btn btn-primary" >Excel Mois</button></a>
                <a href="{{ route('patients.excel') }}"><button class="btn btn-primary" >Excel Semaine</button></a>
                <a href="{{ route('patients.excel') }}"><button class="btn btn-primary" >Excel Jour</button></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->


          </div>


          </div>
  </section>        <!-- /.row -->

<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box" >
        <div class="box-header">
            <h3 class="box-title">CA par Mois</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Date</th>
                <th>Chiffre d'affaires</th>
              </tr>
              </thead>
              <tbody>

                @foreach($consultationsmois as $cons)


              <tr>
                <td>{{$cons->mois}}</td>
                <td>{{$cons->Sum}}</td>
              </tr>
              @endforeach

              </tbody>
              <tfoot>
              <tr>
                <th>Date</th>
                <th>Chiffre d'affaires</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
</div>

<div class="col-md-6">
<div class="box">

        <div class="box-header">
          <h3 class="box-title">CA par An</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Date</th>
              <th>Chiffre d'affaires</th>
            </tr>
            </thead>
            <tbody>

              @foreach($consultations as $cons)


            <tr>
              <td>{{$cons->year}}</td>
              <td>{{$cons->Sum}}</td>
            </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
              <th>Date</th>
              <th>Chiffre d'affaires</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</section>




@endsection

@section('js')
<script>
$( document ).ready(function() {



$(function () {
  $('#example1').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })
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
