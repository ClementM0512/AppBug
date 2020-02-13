<?php
$bug = $params["bug"];
?>


<!DOCTYPE html>
<html>
  <head>
    <?php require("stdafx.php");?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Description du bug</title>
    <meta charset="utf-8" />
  </head>


  <body class="container">
    
    <h1 class="center">Bug : </h1>
    <h3 class="center"><?=$bug->getTitre();?></h3>

    <div class="center DescMarg">

      <?=$bug->getDescription();?><br>

      <?php if ($bug->getStatut()==0){?>
        <div class="badge badge-warning DescMarg">Non traiter</div>
      <?php }
      else{ ?>
        <div class="badge badge-primary DescMarg">Résolut</div>
      <?php } ?>

    </div>
    
    <a href="../list" class="btn btn-success"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
 

  </body>
</html>
