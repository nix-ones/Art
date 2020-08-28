<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">NOUVEAU CLIENT</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo site_url('client/index'); ?>"><i class="fas fa-undo-alt"></i>Retour</a>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="container">
      <?= \Config\Services::validation()->listErrors(); ?>
      <form action="<?php echo base_url('client/validateClient'); ?>" method="post"> 
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" name="nom" class="form-control" placeholder="Nom" >
    </div>
    <div class="form-group col-md-6">
      <input type="text" name="prenom" class="form-control" placeholder="Prénom" >
    </div>
  </div>

  <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="E-mail" >
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input type="text" name="telephone" class="form-control" placeholder="Télephone" >
    </div>
    <div class="col-md-6 mb-3">
      <select class="form-control" name="sexe" >
         <option value="Homme">Homme</option>
         <option value="Femme">Femme</option>
      
       </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col-5">
      <input type="text" name="adresse" class="form-control" placeholder="Adresse" >
    </div>
    <div class="col">
      <input type="date" name="date" class="form-control" placeholder="date de naissance" required>
    </div>
    <div class="col">
      <input type="number" name="cp" class="form-control" placeholder="Code postal" min="1000" max="9999" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01"></label>
      <input type="text" name="ville" class="form-control" placeholder="Ville" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02"></label>
      <select class="form-control" placeholder="Ville" name="langue" placeholder="langue" required>
         <option value="Néerlandais">Néerlandais</option>
         <option value="Français">Français</option>
         <option value="Allemand">Allemand</option>
       </select>
    </div>
  </div>
  <div class="form-group">
  <textarea rows="6" cols="170" name="commentaire" type="text">
  </textarea>
  </div>
  <button class="btn btn-primary btn-lg btn-block">Valider Nouveau client</button> 
</form>
</div>
</div>
