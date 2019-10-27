<!DOCTYPE html>
<?php


    class Bug{
        public $id;
        public $titre;
        public $description;
        public $statut;
        public $createdAt;



        public function __construct($id, $titre, $description, $statut, $createdAt) {
            $this->id = $id;
            $this->titre = $titre;
            $this->description = $description;
            $this->statut = $statut;
            $this->createdAt = $createdAt;
        }

        function getId() {
            return $this->id;
        }

        function getTitre() {
            return $this->titre;
        }

        function getDescription() {
            return $this->description;
        }

        function getStatut() {
            return $this->statut;
        }

        public function getCreatedAt(){
            return $this->createdAt;
        }

        public function setCreatedAt($createdAt){
            $this->createdAt = $createdAt;

            return $this;
        }

        function setId($id) {
            $this->id = $id;

            return $this;
        }

        function setTitre($titre) {
            $this->titre = $titre;

            return $this;
        }

        function setDescription($description) {
            $this->description = $description;

            return $this;
        }

        function setStatut($statut) {
            $this->statut = $statut;

            return $this;
        }
    

  }

?>
