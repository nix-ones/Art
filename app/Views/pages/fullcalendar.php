
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fullcalendar.css');?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/fullcalendar.js');?>"></script>
  <title> Calendrier</title>
  </head>
  
  <body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Artisan Service</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="<?php echo site_url('/Taches'); ?>">Mes Taches</a>
    <a class="p-2 text-dark" href="<?php echo site_url('/Client'); ?>">Mes Clients</a>
    <a class="p-2 text-dark" href="<?php echo site_url('Users/listeClient'); ?>">Mes vues</a>
   
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo site_url('Users/signuOut'); ?>">Se deconnecter</a>
</div>
    <div class="container">
      <div id="fullcalendar">
      </div>
      <script>
          $('#fullcalendar').fullCalendar({
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay,listWeek'
            },
            navLinks: true, 
            editable: true,
            eventLimit: true, 
            events: [<?php 
            
            $sep = "";
              foreach ($evs as $event) {
                 
                  echo $sep;
                  echo "{title:'".$event['titre']."',";
                  echo "debut:'".$event['debut']."',";
                  echo "fin:'".$event['fin']."'}";
              $sep = ",";
          }
            ?>
            ]
          });
        </script> 
    </div> 
</body>
</html>








  