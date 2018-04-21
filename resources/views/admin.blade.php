{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<section class="content-header">
  <h1>Bienvenue</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
    <li class="active"> Dr {{$docteur->nom}}</li>
  </ol>
</section>



<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <div class="col-md-3 col-sm-4"><i class="fa fa-user-md"></i></div>
          <h3 class="profile-username text-center">{{$docteur->nom}} {{$docteur->prenom}}</h3>
          <p class="text-muted text-center">{{$docteur->specialite}}</p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Tel Fixe</b> <a class="pull-right">{{$docteur->telfixe}}</a>
            </li>
            <li class="list-group-item">
              <b>Tel Mobile</b> <a class="pull-right">{{$docteur->telmobile}}</a>
            </li>
            <li class="list-group-item">
              <b>Courriel</b> <a class="pull-right">{{$docteur->mail}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Patients du jour</span>
              <span class="info-box-number">20<small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>

          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nouveaux Patients</span>
              <span class="info-box-number">0<small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>

          <!-- /.info-box -->
        </div>
  </div>
  <!-- ./box-body -->
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
