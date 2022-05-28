<?php
include_once './Models/Article.php';
include_once './Models/Client.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h4 class="logo">Lou3bati</h4></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./Gui/LoginClient.php">Client</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./Gui/LoginVendeur.php">Vendeur</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php
                session_start();
                if (!empty($_SESSION['clog'])){
                    $clientLogged=$_SESSION['clog'];
                    $data=Client::GetNameAndID($clientLogged);
                    while ($row = $data -> fetch()){
                        $nom=$row[0];
                    }
                    $data ->closeCursor();
                    ?>
                    <li class="nav-item dropdown" id="name">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bonjour <?=$nom?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./Gui/BoughtItems.php">My Games</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item active" href="./Traitement/TraitementClient.php?action=logout">Logout</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>


        </div>
    </div>
</nav>


<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h3>Featured Product</h3>
                    <h2>Popular Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
<?php

        $i=0;
        $show=Article::showDataforALL();
        while ($row = $show ->fetch()){

            ?>

                        <!-- Single Product -->
                        <div class="col-md-6 col-lg-4 col-xl-3" id="block">
                            <div id="product-1" class="single-product">
                                <div class="part-1" style="background: url('./images/<?=$row[6]?>')  no-repeat center;background-size: cover;
                                        transition: all 0.3s;">
                                    <ul>
                                        <?php
                                            if ($row[5]<=0){
                                                echo "<li><button class='btn btn-danger'>Out of stock <i class=\"fa-solid fa-ban\"></i></button></li>";
                                            }else{
                                                echo " <li><a href=\"./Gui/checkoutpage.php?Productid=$row[0]\" class=\"btn btn-danger\"><i class=\"fa-solid fa-cart-plus\"></i></a></li>";
                                            }
                                        ?>

                                    </ul>
                                </div>
                                <div class="part-2">
                                    <h3 class="product-title"><?=$row[2]?></h3>
                                    <h4 class="product-price"><?=$row[4]?> MAD</h4>
                                </div>
                            </div>
                        </div>



<?php
        }
?>   </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--CDN JQuery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Smooch&display=swap');

    body {
        font-family: "Poppins", sans-serif;
        color: #444444;
    }

    a,
    a:hover {
        text-decoration: none;
        color: inherit;
    }

    .section-products {
        padding: 80px 0 54px;
    }

    .section-products .header {
        margin-bottom: 50px;
    }

    .section-products .header h3 {
        font-size: 1rem;
        color: #fe302f;
        font-weight: 500;
    }

    .section-products .header h2 {
        font-size: 2.2rem;
        font-weight: 400;
        color: #444444;
    }

    .section-products .single-product {
        margin-bottom: 26px;
    }

    .section-products .single-product .part-1 {
        position: relative;
        height: 290px;
        max-height: 290px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .section-products .single-product .part-1::before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        transition: all 0.3s;
    }



    .section-products .single-product .part-1 .discount,
    .section-products .single-product .part-1 .new {
        position: absolute;
        top: 15px;
        left: 20px;
        color: #ffffff;
        background-color: #fe302f;
        padding: 2px 8px;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    .section-products .single-product .part-1 .new {
        left: 0;
        background-color: #444444;
    }

    .section-products .single-product .part-1 ul {
        position: absolute;
        bottom: -41px;
        left: 20px;
        margin: 0;
        padding: 0;
        list-style: none;
        opacity: 0;
        transition: bottom 0.5s, opacity 0.5s;
    }

    .section-products .single-product:hover .part-1 ul {
        bottom: 30px;
        opacity: 1;
    }




    .section-products .single-product .part-2 .product-title {
        font-size: 1rem;
    }

    .section-products .single-product .part-2 h4 {
        display: inline-block;
        font-size: 1rem;
    }

    .logo{
        color: #fe302f;
        font-family: 'Smooch', cursive;
        font-weight: bolder;
    }






</style>


<script>
    $(".row").hide();
    $(window).ready(function (){
            $(".row").fadeIn();
    })

</script>
