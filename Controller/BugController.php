<?php
require('Models/bugManager.php');

class BugController{

    public function Add(){
        if(isset($_POST['submit'])){
            $bugManager = new BugManager();
            $bug = new Bug();
            $bug->setTitre($_POST["titre"]);
            $bug->setDescription($_POST["description"]);
            $bug->setStatut($_POST["statut"]);
            $bug->setCreatedAt($_POST["createdAt"]);
            $bugManager->add($bug);
            header('Location: /bug/list');
        }
        else{
            $content = $this->render('Views/addBug', []);
            return $this->sendHttpResponse($content, 200);
        }
    }

    public function List(){
        $bugManager = new BugManager();
        $bugs = $bugManager->findAll();
        $content = $this->render('Views/list', ['bugs' => $bugs]);
        
        return $this->sendHttpResponse($content, 200);
    }

    public function Show($id){
        $bugManager = new BugManager();
        $bugs = $bugManager->find($id);
        $content = $this->render('Views/show', ['bugs' => $bugs]);
        
        return $this->sendHttpResponse($content, 200);    
    }

    public function render($templatePath, $params){
        $templatePath = $templatePath . ".php";

        ob_start();
        $params;
        
        require($templatePath);

        return ob_get_clean();
    }

    public static function sendHttpResponse($content, $code = 200){
        http_response_code($code);

        header('content-type: text/html');

        echo $content;
    }

}
?>