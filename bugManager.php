
<?php
  include('bug.php');
  include('conn.php');
  class bugManager{
    private $bug = [];


    function __construct() {

    }

    function Find($id){
      $bdd = connexionBdd();
      $bug = $bdd->query('SELECT * FROM `bug` WHERE id="'.$id.'"',PDO::FETCH_ASSOC);
      return $bug->fetch();
    }

    function FindAll() {
      foreach($this->bug as $bug){
        return $this->bug;
      }
    }

    function load(){
      $bdd = connexionBdd();
      $bugs = $bdd->query('SELECT * FROM `bug` ORDER BY `id`',PDO::FETCH_ASSOC);

      while ($donnee=$bugs->fetch()){
        $bug = new Bug($donnee['id'], $donnee['titre'], $donnee['description'], $donnee['statut'], $donnee['createdAt']);
        // var_dump($donnee['createdAt']);die;
        array_push($this->bug,$bug);
      }
    }

    function addBug(Bug $newBug){
      $bdd = connexionBdd();
      $date = new DateTime();
      $date = $date->format('Y-m-d H:i:s');

      $bdd->query('INSERT INTO `bug` (titre, description, statut, createdAt) VALUE ("'.$newBug->getTitre(). '", "'.$newBug->getDescription(). 
      '", "'. $newBug->getStatut(). '", "'.$date.'")'); 
    }
  }
?>
