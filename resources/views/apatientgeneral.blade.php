@extends('adminlte::page')

@section('title', 'GesDoc')

@section('content_header')

<h3>Ajouter un Patient</h3>
<form action="{{ route('patients.store') }}" method="post">
          {{ csrf_field() }}
<div class="modal-body">
  <div class="bootstrap-iso">
     <div class="container-fluid">
      <div class="row">
       <div class="col-md-6 col-sm-6 col-xs-12">
         <div class="form-group ">
          <label class="control-label requiredField" for="nom">
           Nom
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
            <label class="control-label " for="sexe">
              Select a Choice
            </label>
            <select class="select form-control" id="sexe" name="sexe">
              <option value="H">
                Homme
              </option>
              <option value="F">
                Femme
              </option>
            </select>
          </div>
         <div class="form-group ">
          <label class="control-label " for="naissance">
           Date de naissance
          </label>
          <input class="form-control" id="naissance" name="naissance" placeholder="YYYY-MM-DD" type="text"/>
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
          <label class="control-label " for="addresse">
           Addresse
          </label>
          <input class="form-control" id="addresse" name="addresse" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="medecintraitant">
           Medecin Traitant
          </label>
          <input class="form-control" id="medecintraitant" name="medecintraitant" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="metier">
           Metier
          </label>
          <input class="form-control" id="metier" name="metier" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="allergies">
           Allergies
          </label>
          <input class="form-control" id="allergies" name="allergies" type="text"/>
         </div>
         <div class="form-group ">
          <label class="control-label " for="notes">
           Notes diverses
          </label>
          <input class="form-control" id="notes" name="notes" type="text"/>
         </div>
         <input name="users_id" type="hidden" value="{{\Auth::user()->id}}">
         <input name="patient_id" id="patient_id" type="hidden" value="">
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
