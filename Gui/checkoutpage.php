<?php
    include_once '../Models/Article.php';
    include_once '../Models/Client.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
/*getting the products id*/
$id=$_GET['Productid'];
$showDetails=Article::ShowProductDetails($id);
/*checking if the client is logged in*/
session_start();

if (empty($_SESSION['clog'])){
?>
<body onload="Swal.fire({
            title: 'Error!',
            text: 'You have to be logged in order to buy!',
            icon: 'error'
    })">
<?php
}
else {
    $a = $_SESSION['clog'];
    $idc = Client::GetNameAndID($a);
    while ($row = $idc->fetch()) {
        $idClient = $row[1];
    }

    echo "<body>";
}

?>

<div class="container col-9">
    <div class="card">
        <div class="container-fluid">
            <div class="wrapper row">

                    <?php
                        while ($row = $showDetails->fetch()){

                    ?>

                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img style="background: no-repeat center;background-size: cover;" src="../images/<?=$row[6]?>" /></div>
                    </div>

                </div>
                <div class="details col-md-6 mt-5">
                    <h3 class="product-title"><?=$row[2]?></h3>
                    <p class="product-description"><?=$row[3]?></p>
                    <h4 class="price">current price: <span><?=$row[4]?> MAD</span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <div class="action">
                        <?php
                        if (isset($_SESSION['clog'])){
                            $a=Article::showDatafromart($id);
                            while ($z=$a->fetch()){
                                $idvendeur=$z[7];
                            }
                            ?>
                           <a class="btn btn-outline-danger  btn-lg mt-5" href="../Traitement/TraitementClient.php?action=buy&Productid=<?=$id?>&idClient=<?=$idClient?>&idVendeur=<?=$idvendeur?>">add to cart <i class="fa-solid fa-basket-shopping"></i></a>';
                      <?php  }else{ ?>
                             <a class="btn btn-outline-danger  btn-lg mt-5" href="checkoutpage.php?Productid=<?=$id?>">add to cart <i class="fa-solid fa-basket-shopping"></i></a>
                       <?php }
                        ?>


                    </div>
                </div>
            </div>
        </div>

        <?php
        }

        /*if (isset($_POST['buy'])){

        }*/
        ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">



</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<style>

    /*****************globals*************/
    body {
        font-family: 'open sans', sans-serif;
        overflow-x: hidden; }

    img {

        width: 50%;
        height: 50%;

    }

    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }
    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px; } }

    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }


    .tab-content {
        overflow: hidden; }
    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s; }

    .card {
        margin-top: 50px;
        background: aliceblue;
        padding: 3em;
        line-height: 1.5em; }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; } }

    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }

    .product-title, .price, .sizes, .colors {
        text-transform: UPPERCASE;
        font-weight: bold; }

    .checked, .price span {
        color: #fe302f; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
        margin-bottom: 15px; }

    .product-title {
        margin-top: 0; }

    .add-to-cart, .like {
        background: #fe302f;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease; }
    .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff; }


    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    /*# sourceMappingURL=style.css.map */

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
</style>