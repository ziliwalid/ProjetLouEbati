<?php
include_once __dir__.'/../ConnexionAbd/Dataaccess.php';

 class Article{
     public static function showData($id){
         $req="SELECT * from article where `vendeur_id`=$id";
         return Dataaccess::selection($req);
     }
     public static function showDataforALL(){
         $req="SELECT * from article";
         return Dataaccess::selection($req);
     }

     public static function AjouterJeux($ref,$designation,$pu,$qte,$image,$vendeurId){
         $req="INSERT INTO `article`(`ref`, `designation`, `pu`, `qte`, `image`, `vendeur_id`) VALUES ('$ref','$designation','$pu','$qte','$image','$vendeurId')";
         $cur =Dataaccess::majour($req);
         return $cur;
     }
     public static function ShowProductDetails($id){
         $req="SELECT * from article where `idArt`=$id";
         return Dataaccess::selection($req);
     }
     public static function showDatafromart($id){
         $req="SELECT * from article where `idArt`=$id";
         return Dataaccess::selection($req);
     }



 }