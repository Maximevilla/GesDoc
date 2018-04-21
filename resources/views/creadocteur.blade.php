@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')

<h3>Premiere Connexion </h3>
Veuillez Remplir ce formulaire afin de personnaliser l'application.
Merci.
<form action="{{ route('admin.store') }}" method="post">
          {{ csrf_field() }}
<div class="modal-body">
  <div class="bootstrap-iso">
     <div class="container-fluid">
      <div class="row">
       <div class="col-md-6 col-sm-6 col-xs-12">
         <div class="form-group ">
          <label class="control-label requiredField" for="nom">
           Nom Dr
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="Nom" name="nom" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label requiredField" for="prenom">
           Prenom
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="prenom" name="prenom" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="addresse">
           Adresse
          </label>
          <input class="form-control" id="addresse" name="addresse" type="text"/>
         </div>

         <div class="form-group ">
          <label class="control-label " for="codepostal">
           Code Postal
          </label>
          <input class="form-control" id="codepostal" name="codepostal"  type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="ville">
           Ville
          </label>
          <input class="form-control" id="ville" name="ville"  type="text"/>
         </div>


         <div class="form-group ">
          <label class="control-label " for="telfixe">
           Telephonne Fixe
          </label>
          <input class="form-control" id="telfixe" name="telfixe" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="telmobile">
           Telephone Mobile
          </label>
          <input class="form-control" id="telmobile" name="telmobile" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="mail">
           Email
          </label>
          <input class="form-control" id="mail" name="mail" type="text"/>
         </div>

         <div class="form-group ">
          <label class="control-label " for="specialite">
           Specialite
          </label>
          <input class="form-control" id="specialite" name="specialite" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="web">
           Page web
          </label>
          <input class="form-control" id="web" name="web" placeholder="https://wwww.site.web" type="text"/>
         </div>


         <input name="users_id" type="hidden" value="{{\Auth::user()->id}}">

         <div class="form-group">
          <div>

          </div>
         </div>

         <div class="modal-footer">
           <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
         </div>

       </div>
      </div>
     </div>
    </div>


</div>

</form>

@endsection
