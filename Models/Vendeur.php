<?php
include_once __dir__.'/../ConnexionAbd/Dataaccess.php';

class Vendeur
{
        public static function InscriptionVendeur($nom,$prenom,$mail,$password,$domaine,$sexe){
            $req="INSERT INTO `vendeur`(`nom`, `prenom`, `mail`, `password`, `domaine`,`sexe`) VALUES ('$nom','$prenom','$mail','$password','$domaine','$sexe')";
            return Dataaccess::majour($req);
        }
        public static function GetNameAndID($mail){
            $req="select prenom, id from vendeur where `mail`='$mail'";
            return Dataaccess::selection($req);
        }
        public static function GetVendeur($mail,$pass){
            $req="select * from vendeur where `mail`='$mail' and `password`='$pass'";
            $cur=Dataaccess::selection($req);
            $row=$cur->rowCount();
            return $row;
        }
}