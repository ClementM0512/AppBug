<?php

include("../Models/bugManager.php");
include("stdafx.php");

$bugManager = new bugManager();
$bugManager->load();

?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Liste des bugs</title>
    <meta charset="utf-8" />
  </head>
  <body class="container">

    <h1 class="center title">Liste des bugs</h1>
    <form action="addBug.php" method="">
    </br> <div id="bouton"><button type="submit" class="btn btn-success"><i class="fa fa-plus fa-3x "></i></button></div>
    </form>

    


    <table class="table">
      <h3 class="center"> Listes des bugs rencontrées</h3>
  
      <tr class="table-primary">
        <th><h4>Id du bug</h4></th>
        <th>Titre du bug</th>
        <th>Description du bug</th>
        <th>Statut du bug</th>
        <th>Créer le</th>
        <th>Plus de détails</th>

      </tr>

      <tbody>
        <tr>
          
          <?php foreach($bugManager->FindAll() as $bug){ ?>
            <tr>

              <td><?= $bug->getId();?></td>
              <td><?= $bug->getTitre();?></td>
              <td><?=$bug->getDescription();?> </td>
              <td><?php
              if ($bug->getStatut()==0){?>

                <div class="btn btn-warning">Non traiter</div>

              <?php }
              else{ ?>

                <div class="btn btn-primary">Résolut</div>

              <?php } ?> </td>
              <td><?=$bug->getCreatedAt();?> </td>
              <td><a href="show.php?id=<?=$bug->getId()?>"><center><i class="fas fa-search fa-2x"></center></a></td>
            </tr>
          <?php } ?>
      </tr>
    </table></div>
    
  </body>
</html>
