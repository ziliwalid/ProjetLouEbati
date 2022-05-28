<?php
include_once __dir__.'/../ConnexionAbd/Dataaccess.php';
class Client
{
    public static function InscriptionClient($nom,$prenom,$mail,$mdp){
        $req="INSERT INTO `client` (`nom`, `prenom`, `mail`, `password`) VALUES ('$nom', '$prenom', '$mail', '$mdp');";
        return Dataaccess::majour($req);
    }
    public static function getClient($mail,$pass){
        $req="select * from client where `mail`='$mail' and `password`='$pass'";
        $cur=Dataaccess::selection($req);
        $row=$cur->rowCount();
        return $row;
    }
    public static function GetNameAndID($mail){
        $req="select prenom, id from `client` where `mail`='$mail'";
        return Dataaccess::selection($req);
    }
    public static function acheterItem($idart,$idvendeur,$idclient){
        self::decreasingQte($idart);
        self::insertInInventory($idvendeur,$idclient,$idart);
    }
/*Traitement d'achat*/
    private static function decreasingQte($id){
        $req="Update article set qte=qte-1 where `idArt`='$id'";
        return Dataaccess::majour($req);
    }
    private static function insertInInventory($idvendeur,$idclient,$idArt){
        $req="INSERT INTO `boughtitems`(`idvendeur`, `idclient`, `idArt`) VALUES ('$idvendeur','$idclient','$idArt')";
        return Dataaccess::majour($req);
    }
/*end traitement*/
    public static function showBoughtItemes($id){
        $req=" select designation , image, prenom, idclient from article a, vendeur v, boughtitems b where a.idArt=b.idArt and v.id=b.idvendeur and  b.idclient='$id';";
        return Dataaccess::selection($req);
    }
}