<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">LISTE TEMPON</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo site_url('client/newClient'); ?>"><i class="fas fa-user-plus"></i>Nouveau Client</a>
          </div>
        </div>
      </div>


    <div class="container-fluid">
    <div class="row">
       

          <div class="col-auto">
        <table class="table" id="table">
            <thead>
                <tr>
                
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">SEXE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">ADRESSE</th>
                <th scope="col">CODE POSTAL</th>
                <th scope="col">VILLE</th>
                <th scope="col">LANGUE</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user ) :?>
               
               <tr>
                    
                    <td><?php echo $user->nom  ; ?></td>
                    <td><?php echo $user->prenom ; ?></td>
                    <td><?php echo $user->genre ; ?></td>
                    <td><?php echo $user->email ; ?></td>
                    <td><?php echo $user->date ; ?></td>
                    <td><?php echo $user->telephone ; ?></td>
                    <td><?php echo $user->adresse ; ?></td>
                    <td><?php echo $user->code_postal ; ?></td>
                    <td><?php echo $user->ville ; ?></td>
                    <td><?php echo $user->langue ; ?></td>
                    <td>
                        
                    </td>
               </tr>            
            <?php endforeach;?>
          </tbody>
        </table>
    </div>
</div>
</div>
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>