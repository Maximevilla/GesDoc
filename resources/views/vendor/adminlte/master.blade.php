<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
<!-- Datetimepicker -->

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    @endif
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="//cdn.jsdelivr.net/npm/jquery-ui-timepicker-addon@1.6.3/dist/jquery-ui-timepicker-addon.min.js"></script>


@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


<script type="text/javascript">
$( document ).ready(function() {


  //Date range picker

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })


  $('#datetimepicker').datetimepicker();

$('#datepicker').datepicker();

$(document).ready(function() {
    $('.selectpatients').select2();
});

});


</script>

<script>
$('#ModalDel').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var patient_id = button.data('patientid')

  var modal = $(this)

  modal.find('.modal-body #patient_id').val(patient_id)

})
</script>
<script>
$('#ModalEdit').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var patient_id = button.data('patientid')
  var nom = button.data('nom')
  var prenom = button.data('prenom')
  var naissance = button.data('naissance')
  var addresse = button.data('addresse')
  var telfixe = button.data('telfixe')
  var telmobile = button.data('telmobile')
  var mail = button.data('mail')
  var sexe = button.data('sexe')
  var numeross = button.data('numeross')
  var mutuelle = button.data('mutuelle')
  var medecintraitant = button.data('medecintraitant')
  var allergies = button.data('allergies')
  var notes = button.data('notes')



  var modal = $(this)

  modal.find('.modal-body #patient_id').val(patient_id)
  modal.find('.modal-body #Nom').val(nom)
  modal.find('.modal-body #prenom').val(prenom)
  modal.find('.modal-body #naissance').val(naissance)
  modal.find('.modal-body #addresse').val(addresse)
  modal.find('.modal-body #telfixe').val(telfixe)
  modal.find('.modal-body #telmobile').val(telmobile)
  modal.find('.modal-body #mail').val(mail)
  modal.find('.modal-body #sexe').val(sexe)
  modal.find('.modal-body #numero_ss').val(numeross)
  modal.find('.modal-body #mutuelle').val(mutuelle)
  modal.find('.modal-body #medecintraitant').val(medecintraitant)
  modal.find('.modal-body #allergies').val(allergies)
  modal.find('.modal-body #notes').val(notes)
})
</script>


@yield('adminlte_js')

</body>
</html>
