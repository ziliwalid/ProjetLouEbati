<?php
include_once '../Models/Vendeur.php';
include_once '../Models/Article.php';
session_start();
$mail=$_SESSION['slog'];
$cur=Vendeur::GetNameAndID($mail);
while ($row = $cur -> fetch()){
    $name=$row[0];
    $id=$row[1];
}
$cur->closeCursor();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<?php

echo "<script type=\"text/javascript\">toastr.success('Have Fun')</script>";
?>

<div class="container mt-5 az">

    <table class="table">
        <thead>
        <div class="row">
            <div class="col-sm-6">
                <h2>Bonjour <span class="name"><?=$name?></span></h2>
                <h3>Gérez vos Articles</h3>
            </div>
            <div class="col-sm-6 mt-4">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un Article</button>
                <a href="../Traitement/TraitementVendeur.php?action=logout" class="btn btn-danger" >Logout</a>
            </div>
        </div>
        <tr>
            <th scope="col">Référence</th>
            <th scope="col">Désignation</th>
            <th scope="col">Prix Unitaire</th>
            <th scope="col">Quantié</th>
            <th scope="col">Image du produit</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
                $showData=Article::showData($id);
                while ($row = $showData->fetch()){
                    echo "<tr><td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td>$row[5]</td>";
                    echo "<td><img src='../images/$row[6]' class='img-thumbnail rounded mx-auto d-block' alt='...'></td></tr>";
                }
            ?>
        </tr>
        </tbody>
    </table>
</div>

<!--Modals-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Un Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="../Traitement/TraitementVendeur.php" enctype="multipart/form-data">
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="ref" class="form-label">Référence :</label>
                        <input class="form-control" id="ref" name="ref">
                    </div>
                    <div class="mb-3">
                        <label for="ref" class="form-label">Désignation :</label>
                        <input class="form-control" id="ref" name="des">
                    </div>
                    <div class="mb-3">
                        <label for="ref" class="form-label">Prix Unitaire</label>
                        <input class="form-control" id="ref" name="pu">
                    </div>
                    <div class="mb-3">
                        <label for="ref" class="form-label">Quantité</label>
                        <input class="form-control" id="ref" type="number" name="qte">
                        <input type="hidden" name="id" value="<?=$id?>">
                    </div>
                    <div class="mb-3">
                        <label for="ref" class="form-label">Image du produit</label>
                        <input class="form-control" type="file" id="ref" name="uploadfile">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="action" value="Ajout">Ajouter</button>
            </div></form>
        </div>
    </div>
</div>



<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</body>
</html>

<style>
    /*.ze{
        background: rgb(34,193,195) no-repeat;
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,45,210,1) 100%);
        border-radius: 5px;
    }*/
    .az{
        background: aliceblue;
        border-radius: 5px;
    }
    .name{
        font-weight: bold;
        color: #4169E1;
    }
    body {
        background: linear-gradient(270deg, #0bd8d6, #f41c4e);
        background-size: 400% 400%;

        -webkit-animation: bodyColors 30s ease infinite;
        -moz-animation: bodyColors 30s ease infinite;
        animation: bodyColors 30s ease infinite;
    }

    @-webkit-keyframes bodyColors {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
    @-moz-keyframes bodyColors {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
    @keyframes bodyColors {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
    .img-thumbnail{
        width: 50px;
        height: 50px;
    }
    td,th{
        text-align: center;
    }
</style>
