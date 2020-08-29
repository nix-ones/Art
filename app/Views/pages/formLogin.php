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
  

<?php echo\Config\ Services::validation()->listErrors()?>
<form class="insc-form" action="<?php echo base_url('users/connexion'); ?>" method="post">
  <input type="email" name="email" class="forme" placeholder="entre email" required>
  <input type="password" name="password" class="forme" placeholder="entre mot de passe" required>
  <input type="submit" class="nn" value="Valider" > 
  <a class="fdsv" href="<?php echo site_url('users/newUsers'); ?>">inscription</a>
</form>
</div>
</body>
</html>