@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')

<section class="content">

  <div class="row">

    <div class="col-md-6">
      <div class="box" >
        <div class="box-header">
            <h3 class="box-title">CA par Jour</h3>
            <div class="box-tools pull-right">

            <a href="{{ route('chiffreaffaires.excelparjour') }}"><button class="btn btn-primary" >Excel</button></a>
          </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Date</th>
                <th>Moyen de Paiment</th>
                <th>Chiffre d'affaires</th>
              </tr>
              </thead>
              <tbody>

                @foreach($consultationsjour as $cons)


              <tr>
                <td>{{$cons->daymonthyear}}</td>
                <td>{{$cons->tp}}</td>
                <td>{{money_format("%.2n", $cons->Sum)}}</td>
              </tr>
              @endforeach

              </tbody>
              <tfoot>
              <tr>
                <th>Date</th>
                <th>Moyen de Paiment</th>
                <th>Chiffre d'affaires</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
  </div>


    <div class="col-md-6">
      <div class="box box-default collapsed-box" >
        <div class="box-header">
            <h3 class="box-title">CA par Mois</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example3" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Date</th>
                <th>Chiffre d'affaires</th>
              </tr>
              </thead>
              <tbody>

                @foreach($consultationsmois as $cons)


              <tr>
                <td>{{$cons->monthyear}}</td>
                <td>{!! money_format("%.2n", $cons->Sum) !!}</td>
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
<div class="box box-default collapsed-box">

        <div class="box-header">
          <h3 class="box-title">CA par An</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
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
              <td>{{money_format("%.2n", $cons->Sum)}}</td>
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
  </div>


  <div class="box-footer">
    <div class="row">
      <div class="col-sm-3 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
          <h5 class="description-header">$35,210.43</h5>
          <span class="description-text">Ca Jour/span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-3 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
          <h5 class="description-header">$10,390.90</h5>
          <span class="description-text">Ca Semaine</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-3 col-xs-6">
        <div class="description-block border-right">
          <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
          <h5 class="description-header">$24,813.53</h5>
          <span class="description-text">Ca Mois</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-3 col-xs-6">
        <div class="description-block">
          <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
          <h5 class="description-header">1200</h5>
          <span class="description-text">Nouveaux Patients Mois</span>
        </div>
        <!-- /.description-block -->
      </div>
    </div>
    <!-- /.row -->
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
  $('#example3').DataTable({
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
