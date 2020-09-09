<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">NOUVELLE TÂCHE</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo site_url('client/index'); ?>"><i class="fas fa-undo-alt"></i>Retour</a>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="container">
      <?= \Config\Services::validation()->listErrors(); ?>
      <form action="<?php echo base_url('taches/modifierTache'); ?>" method="post"> 
 
      <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Selectionne nom dU client</label>
      <select name="idclient" class="form-control"value="<?php echo $tache[0]['idclient']?>">  
      
      <?php
          foreach($clients as $client){
            echo "<option value='".$client->id."'>".$client->nom."</option>";
          }
      ?>
     
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Selection le Statut</label>
      <select name="idStatut" class="form-control" value="<?php echo $tache[0]['idStatut']?>" >  
      
      <?php
          foreach($statuts as $statut){
            echo "<option value='".$statut->id."'>".$statut->nom_status."</option>";
          }
      ?>
     
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip01">Titre</label>
      <input type="text" name="titre" class="form-control" value="<?php echo $tache[0]['titre']?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltip02">Description de la tâche</label>
      <input type="text" name = "description" class="form-control" value="<?php echo $tache[0]['description']?>" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Prix</label>
      <input type="float"name ="prix" class="form-control" id="validationDefault03" value="<?php echo $tache[0]['prix']?>" >
    </div>
    <div class="col-md-3 mb-3">
    <label for="validationDefault05">Date de Fin</label>
      <input type="date" name="debut" class="form-control" id="validationDefault05" value="<?php echo $tache[0]['debut']?>">
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Date de Fin</label>
      <input type="date" name="fin" class="form-control" id="validationDefault05" value="<?php echo $tache[0]['fin']?>">
    </div>
  </div>
  
  <div class="form-group">
  <textarea rows="6" cols="170" name="commentaire" type="text"> value=<?php echo $tache[0]['commentaire']?> </textarea>
  </div>

  
  <button class="btn btn-primary btn-lg btn-block">Valider Nouvelle tâche</button> 
</form>
</div>
</div>
