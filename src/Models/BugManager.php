<?php
  namespace AppBug\Models;
  use AppBug\Models\Bug;
  use AppBug\Models\Manager;
  
  class BugManager extends Manager{
    private $bugs = [];

    function __construct() {

    }

    public function Find($id){
      $bdd = $this->connexionBdd();
      $state = $bdd->prepare('SELECT * FROM `bug` WHERE id=:id');
      // var_dump($bug);
      $state->execute(['id' => $id]);

      $data = $state->fetch(\PDO::FETCH_ASSOC);
      $bug = new Bug($data['id'], $data['titre'], $data['description'], $data['statut'], $data['createdAt']);

      return($bug);
    }

    public function FindAll() {
      foreach($this->bugs as $bug){
        return $this->bugs;
      }
    }

    public function load(){
      $bdd = $this->connexionBdd();
      $bugs = $bdd->query('SELECT * FROM `bug` ORDER BY `id`',\PDO::FETCH_ASSOC);
      // var_dump($bdd);

      while ($donnee=$bugs->fetch()){
        $bug = new Bug($donnee['id'], $donnee['titre'], $donnee['description'], $donnee['statut'], $donnee['createdAt']);
        //var_dump($bug);
        array_push($this->bugs,$bug);
      }
    }

    public function addBug(Bug $newBug){
      $bdd = $this->connexionBdd();
      $date = new DateTime();
      $date = $date->format('Y-m-d H:i:s');

      // $bdd->query('INSERT INTO `bug` (titre, description, statut, createdAt) VALUE ("'.$newBug->getTitre(). '", "'.$newBug->getDescription(). 
      // '", "'. $newBug->getStatut(). '", "'.$date.'")'); 

      //changer par:
      //prepare, execute, fetch
      $state = $bdd->prepare("INSERT INTO `bug` (titre, description, statut, createdAt) VALUE (:title, :description, :statut, :createdAt)");
      $state->execute([
        'title' => $newBug->getTitre(),
        'description' => $newBug->getDescription(),
        'statut' => $newBug->getStatut(),
        'createdAt' => $date
      ]);

    }

    public function UpdateBug(Bug $bug){
      $bdd = $this->connexionBdd();
      // var_dump($bug->getTitre());die;
      $state = $bdd->prepare("UPDATE `bug` SET titre = :title, description = :description, statut = :statut WHERE id=:id");
      $state->execute([
        'title' => $bug->getTitre(),
        'description' => $bug->getDescription(),
        'statut' => $bug->getStatut(),
        'id' => $bug->getId()]);
      
    }

    public function FindByStatut() {
      $bdd = $this->connexionBdd();
      $bugs = $bdd->query('SELECT * FROM `bug` WHERE statut=0 ORDER BY `id`',\PDO::FETCH_ASSOC);

      while ($donnee=$bugs->fetch()){
        $bug = new Bug($donnee['id'], $donnee['titre'], $donnee['description'], $donnee['statut'], $donnee['createdAt']);
        //var_dump($bug);
        array_push($this->bugs,$bug);
      }

      // var_dump($this->bugs);
      return($bugs);
    }

  }
?>
