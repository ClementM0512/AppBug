<?php

// include("./Models/bugManager.php");



$arguments = explode("/", $_SERVER["REQUEST_URI"]);

$bugManager = new bugManager();
$bug = $bugManager->Find($arguments[5]);
?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
    <link rel="stylesheet" href="../bootstrap.css"/>
    <link rel="stylesheet" href="../AppStylesheet.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Description du bug</title>
    <meta charset="utf-8" />
  </head>


  <body class="container">
    
    <h1 class="center">Bug : </h1>
    <h3 class="center"><?=$bug['titre'];?></h3>

    <div class="center DescMarg">

      <?=$bug['description'];?><br>

      <?php if ($bug['statut']==0){?>
        <div class="badge badge-warning DescMarg">Non traiter</div>
      <?php }
      else{ ?>
        <div class="badge badge-primary DescMarg">Résolut</div>
      <?php } ?>

    </div>
    
    <a href="../list" class="btn btn-success"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
 

  </body>
</html>
