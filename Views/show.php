<?php

include("../Models/bugManager.php");
include("stdafx.php");


//FAIRE LA FONC FINDBYID//
$id=$_GET['id'];
$bugManager = new bugManager();
$bug = $bugManager->Find($id);
?>



<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?=$bug['titre'];?></title>
    <meta charset="utf-8" />
  </head>
  <body class="container">

    <h1 class="center">Bug : </h1>
    <h3 class="center"><?=$bug['titre'];?></h3>

    <div class="center DescMarg">

      <?=$bug['description'];?><br>

      <?php if ($bug['statut']==0){?>
        <div class="btn btn-warning DescMarg">Non traiter</div>
      <?php }
      else{ ?>
        <div class="btn btn-primary DescMarg">Résolut</div>
      <?php } ?>

    </div>
    <form action="liste.php" method="">
    <div id="bouton"><button type="submit" class="btn btn-success"><i class="fas fa-arrow-circle-left fa-3x"></i></button></div>
    </form>

  </body>
</html>
