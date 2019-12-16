<!DOCTYPE html>

<?php
include("Views/stdafx.php");
include("Controller/BugController.php");

// var_dump($_SERVER["REQUEST_URI"]);

$arguments = explode("/", $_SERVER["REQUEST_URI"]);

// var_dump($arguments);


switch ($arguments[4]) {

    case "":
    case "list":
        return (new BugController())->List();
        break;
    case "show":
        $id = $arguments[5];
        return (new BugController())->Show($id);
        break;
    case "add":
        return (new BugController())->Add();
        break;
    case "updt":
        return (new BugController())->Update();
        break;
    default:
        return (new BugController())->Error(); //Erreur 404
}

?>