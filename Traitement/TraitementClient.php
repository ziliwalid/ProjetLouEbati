<?php
include_once '../Models/Client.php';
include_once '../Models/Article.php';

$action = "index";
if (isset($_GET['action']))
    $action = $_GET['action'];
else if(isset($_POST['action']))
    $action = $_POST['action'];
switch ($action) {
    case "Sign Up":
          Client::InscriptionClient($_GET['nom'],$_GET['prenom'],$_GET['mail'],$_GET['password']);
          header('location:../index.php');
        break;
    case "logout":
        session_start();
        unset($_SESSION["clog"]);
        header('location:../index.php');
        ;break;
    case "buy":
        Client::acheterItem($_GET['Productid'],$_GET['idVendeur'],$_GET['idClient']);
        header("location:../index.php");
        ;break;
}
