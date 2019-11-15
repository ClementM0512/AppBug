
<?php
  include('bug.php');
  include('Manager.php');

  class bugManager extends Manager{
    private $bugs = [];

    function __construct() {

    }

    function Find($id){
      $bdd = $this->connexionBdd();
      $bug = $bdd->query('SELECT * FROM `bug` WHERE id="'.$id.'"',PDO::FETCH_ASSOC);
      // var_dump($bug);


      return($bug->fetch());
    }

    function FindAll() {
      foreach($this->bugs as $bug){
        return $this->bugs;
      }
    }

    function load(){
      $bdd = $this->connexionBdd();
      $bugs = $bdd->query('SELECT * FROM `bug` ORDER BY `id`',PDO::FETCH_ASSOC);

      while ($donnee=$bugs->fetch()){
        $bug = new Bug($donnee['id'], $donnee['titre'], $donnee['description'], $donnee['statut'], $donnee['createdAt']);
        // var_dump($bug);
        array_push($this->bugs,$bug);
      }
    }

    function addBug(Bug $newBug){
      $bdd = $this->connexionBdd();
      $date = new DateTime();
      $date = $date->format('Y-m-d H:i:s');

      $bdd->query('INSERT INTO `bug` (titre, description, statut, createdAt) VALUE ("'.$newBug->getTitre(). '", "'.$newBug->getDescription(). 
      '", "'. $newBug->getStatut(). '", "'.$date.'")'); 
    }
  }
?>
