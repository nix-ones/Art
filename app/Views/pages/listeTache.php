<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">LISTE DES TÂCHES</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo site_url('taches/newtache'); ?>"><i class="fas fa-user-plus"></i>Nouvelle tâche</a>
          </div>
        </div>
      </div>


<div class="container-fluid">
    <div class="row">
       

          <div class="col-auto">
        <table class="table" id="table">
            <thead>
                <tr> 
                <th scope="col">CLIENT</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">DATE</th>
                <th scope="col">DUREE</th>
                <th scope="col">PRIX</th>
                <th scope="col">STATUT</th>
                <th scope="col">COMMENTAIRE</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($taches as $tache ) :?>
               <tr>
                    
                    <td><?php echo $tache->idclient; ?></td>
                    <td><?php echo $tache->description; ?></td>
                    <td><?php echo $tache->date; ?></td>
                    <td><?php echo $tache->dure; ?></td>
                    <td><?php echo $tache->prix; ?></td>
                    <td><?php echo $tache->statut; ?></td>
                    <td><?php echo $tache->commentaire; ?></td>
                    <td>
                    <a class="btn btn-danger" href="<?php echo base_url('taches/deleteTache/'.$tache->id)?>"> <i class="fa fa-trash-alt"></i></a>
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