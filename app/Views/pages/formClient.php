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
    

  <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="E-mail" >
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input type="text" name="telephone" class="form-control" placeholder="Télephone" >
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
  
    
  <select name="ville" class="form-control">  
      
      <?php
          foreach($citys as $city){
            echo "<option value='".$city->id."'>".$city->ville."</option>";
          }
      ?>
     
      </select>
      <select name="sexe" class="form-control">  
      
      <?php
          foreach($sexes as $sexe){
            echo "<option value='".$sexe->id."'>".$sexe->genre."</option>";
          }
      ?>
     
      </select>
      <select name="langue" class="form-control">  
      
      <?php
          foreach($langues as $langue){
            echo "<option value='".$langue->id."'>".$langue->lang_name."</option>";
          }
      ?>
     
      </select>
      <div class="col-5">
      <input type="file" name="photo" class="form-control" placeholder="phoyo" >
    </div>
  
  <div class="form-group">
  <textarea rows="6" cols="170" name="commentaire" type="text">
  </textarea>
  </div>
  <button class="btn btn-primary btn-lg btn-block">Valider Nouveau client</button> 
</form>
</div>
</div>
