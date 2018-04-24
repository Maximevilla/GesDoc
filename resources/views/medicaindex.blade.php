{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<section class="content-header">
  <h1>Medica</h1>

</section>

<input type="text" id="searchInput" class="typeahead" data-provide="typeahead" >


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
