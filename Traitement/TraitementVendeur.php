<?php
include_once '../Models/Vendeur.php';
include_once '../Models/Article.php';

$action = "index";
if (isset($_GET['action']))
    $action = $_GET['action'];
else if(isset($_POST['action']))
    $action = $_POST['action'];
switch ($action) {
    case "Sign Up":
       Vendeur::InscriptionVendeur($_GET['nom'],$_GET['prenom'],$_GET['mail'],$_GET['password'],$_GET['domaine'],$_GET['gender']);
        break;
    case "logout":
        session_start();
        unset($_SESSION["slog"]);
        header('location:../index.php');
        break;
    case "Ajout":
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/".$filename;
        copy($tempname,$folder);
        Article::AjouterJeux($_POST['ref'],$_POST['des'],$_POST['pu'],$_POST['qte'],$filename,$_POST['id']);
        header('location:../Gui/DashboardVendeur.php');
        break;/*
    case "rechercher":
        // researchAB($_GET['sem']);
        break;*/
}

//header('location:../index.php');