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
      <form action="<?php echo base_url('taches/mofierTache'); ?>" method="post"> 
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" name="idclient" class="form-control" placeholder="Selection client" value="<?php echo $tache[0]['idclient']?>">
    </div>
    <div class="form-group col-md-6">
      <input type="date" name="date" class="form-control" placeholder="Entrer la date" value="<?php echo $tache[0]['date']?>" >
    </div>
  </div>

  <div class="form-group">
    <input type="text" name="description" class="form-control" placeholder="Entrer la déscription" value="<?php echo $tache[0]['description']?>">
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input type="text" name="dure" class="form-control" placeholder="entret la durée du travail" value="<?php echo $tache[0]['dure']?>">
    </div>
    <div class="col-md-6 mb-3">
      <select class="form-control" name="statut" >
         <option value="FAIT">Fait</option>
         <option value="EN COURS">En cours</option>
         <option value="EN ATTENTE">  En attente</option>
      
       </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col-5">
      <input type="number" name="prix" class="form-control" placeholder="Montant" value="<?php echo $tache[0]['prix']?>">
    </div>
  </div>

  <div class="form-group">
      <textarea rows="6" cols="170" name="commentaire" type="text"> <?php echo $tache[0]['commentaire']?></textarea>
  </div>
  <input type="hidden" name="id" value="<?php echo $tache[0]['id']?>" >
  

  <button class="btn btn-primary btn-lg btn-block">MODIFIER LES TACHES</button> 
</form>
</div>
</div>
