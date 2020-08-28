<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">LISTE DE CLIENT</h1>
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
            <?php foreach ($clients as $client ) :?>
               <tr>
                    
                    <td><?php echo $client->nom; ?></td>
                    <td><?php echo $client->prenom; ?></td>
                    <td><?php echo $client->sexe; ?></td>
                    <td><?php echo $client->email; ?></td>
                    <td><?php echo $client->date; ?></td>
                    <td><?php echo $client->telephone; ?></td>
                    <td><?php echo $client->adresse; ?></td>
                    <td><?php echo $client->code_postal; ?></td>
                    <td><?php echo $client->ville; ?></td>
                    <td><?php echo $client->langue; ?></td>
                    <td>
                        
                        <a class="btn btn-danger" href="<?php echo base_url('client/deleteClient/'.$client->id)?>"> <i class="fa fa-trash-alt"></i></a>
                        <a class="btn btn-warning" href="<?php echo base_url('client/updateForm/'.$client->id)?>"> <i class="far fa-edit"></i></a>
                        
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