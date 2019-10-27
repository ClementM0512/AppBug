<?php
include("stdafx.php");
include('bugManager.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ajout d'un bug</title>
    <meta charset="utf-8" />
  </head>
  <body class="container">

    <h1>Ajout d'un bug</h1>

 

  <div class="form-group">
    <?php
    if(empty($_POST)){ ?>
      <form action="" method="post">
        <input class="Titre form-control"type="text" name="titre" value = '' placeholder="Titre du bug"/>
        <textarea class="Description form-control" type="textarea" cols="40" rows="5" name="description" value = '' placeholder="Description du bug"></textarea>
        <input type="hidden" name="statut" value ="0"/>


        <input class="btn btn-success button"type="submit" value="Valider" />
      </form>
  </div>

  <form action="liste.php" method="">
    <button type="submit" class="btn btn-success"><i class="fas fa-arrow-circle-left fa-3x"></i></button>
  </form>
    <?php }
    else{

      $bug = new Bug("",$_POST['titre'],$_POST['description'],$_POST['statut'],"");


      // var_dump($bug);die; 
      $manager = new bugManager();
      $manager->addBug($bug);
      header("Location:liste.php");

    } ?>

  </body>
</html>
