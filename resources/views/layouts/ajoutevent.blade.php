<form action="{{ route('events.store') }}" method="post">
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
           Date Debut
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="datedebut" name="datedebut" type="date"/>
         </div>
         <div class="form-group ">
          <label class="control-label requiredField" for="prenom">
           Date fin
           <span class="asteriskField">
            *
           </span>
          </label>
          <input class="form-control" id="datedebut" name="datedebut" type="date"/>
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





         <input name="users_id" type="hidden" value="">
         <div class="form-group">
          <div>

          </div>
         </div>

       </div>
      </div>
     </div>
    </div>


</div>


<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</div>
</form>
