<!DOCTYPE html>

<?php
include("Views/stdafx.php");

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
        require 'Views/List.php';
        break;
    case "show":
        require 'Views/show.php';
        break;
    case "add":
        require 'Views/addBug.php';
        break;
    default:
        require '404.php';
}

?>