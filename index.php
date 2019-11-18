<!DOCTYPE html>

<?php
include("Views/stdafx.php");
include("Controller/BugController.php");

$url = '';

// var_dump($_SERVER["REQUEST_URI"]);

$arguments = explode("/", $_SERVER["REQUEST_URI"]);

// var_dump($arguments);

if(isset($_GET['url'])) {
    $url = $_GET['url'];
}

switch ($arguments[4]) {

    case "":
    case "list":
        return (new BugController())->list();
        break;
    case "show":
        return (new BugController())->show();
        break;
    case "add":
        return (new BugController())->add();
        break;
    default:
        require '404.php';
}

?>