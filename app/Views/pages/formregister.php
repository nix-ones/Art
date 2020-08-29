<!DOCTYPE html >
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dashboard.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">


    <script src="<?php echo base_url('assets/js/jquery-3.5.1.slim.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</head>

<body> 
<div class="form-inscription">
<h1>Je m'inscris</h1>
<div class="border"></div>

<div class='row'>
    <div class="col-6">
      <div class="alert alert-danger">
      <?php echo\Config\ Services::validation()->listErrors()?>
      </div>
    </div>
</div>
  

<form class="insc-form" action="<?php echo base_url('users/register'); ?>" method="post">
  <input type="text" name="nom" class="forme" placeholder="entre nom" required>
  <input type="text" name="prenom" class="forme" placeholder="entre prenom" required>
  <input type="date" name="date" class="forme" placeholder="entre date de naissance" required>
  <input type="email" name="email" class="forme" placeholder="entre e-mail" required>
  <select class="forme" name="sexe" placeholder="Sexe" required>
     <option value="homme">Homme</option>
     <option value="femme">Femme</option>
  </select>
  <input type="password" name="password" class="forme" placeholder="entre mot de passe" required>
  <input type="password" name="passwordC" class="forme" placeholder="confirme mot de passe" required>
  <input type="submit" class="nn" value="Valider">
</form>
</div>
</body>
</html>