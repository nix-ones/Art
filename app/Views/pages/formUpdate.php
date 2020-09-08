<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">MODIFIER CLIENT </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo site_url('client/index'); ?>"><i class="fas fa-undo-alt"></i>Retour</a>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="container">
      <?= \Config\Services::validation()->listErrors(); ?>
      <form action="<?php echo base_url('client/updateClient'); ?>" method="post"> 
    
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?php echo $client[0]['nom']?>" >
    </div>
    <div class="form-group col-md-6">
      <input type="text" name="prenom" class="form-control" placeholder="Prénom"  value="<?php echo $client[0]['prenom']?>">
    </div>
  </div>

  <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="E-mail"  value="<?php echo $client[0]['email']?>">
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input type="text" name="telephone" class="form-control" placeholder="Télephone"  value="<?php echo $client[0]['telephone']?>">
    </div>
    <div class="col-md-6 mb-3">
      <select class="form-control" name="sexe"  value="<?php echo $client[0]['sexe']?>">
         <option value="Homme">Homme</option>
         <option value="Femme">Femme</option>
      
       </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col-5">
      <input type="text" name="adresse" class="form-control" placeholder="Adresse"  value="<?php echo $client[0]['adresse']?>">
    </div>
    <div class="col">
      <input type="date" name="date" class="form-control" placeholder="date de naissance"  value="<?php echo $client[0]['date']?>" required>
    </div>
    <div class="col">
      <input type="number" name="cp" class="form-control" placeholder="Code postal" min="1000" max="9999"  value="<?php echo $client[0]['code_postal']?>" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01"></label>
      <input type="text" name="ville" class="form-control" placeholder="Ville"  value="<?php echo $client[0]['ville']?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02"></label>
      <select class="form-control" placeholder="Ville" name="langue" placeholder="langue"  value="<?php echo $client[0]['langue']?>" required>
         <option value="Néerlandais">Néerlandais</option>
         <option value="Français">Français</option>
         <option value="Allemand">Allemand</option>
       </select>
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
    <textarea rows="6" cols="70" name="commentaire" type="text" ><?php echo $client[0]['commentaire']?></textarea>
    </div>
    <div class="form-group col-md-6">
       INSERT UNE PHOTO <input type="file" name="photo">
    </div>
  </div>


  <input type="hidden" name="id" value="<?php echo $client[0]['id']?>" >
  <button class="btn btn-primary btn-lg btn-block">Modifier client</button> 
</form>
</div>
</div>
