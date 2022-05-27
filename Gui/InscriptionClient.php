<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Inscription Client</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./LoginClient.php">login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form method="get" action="../Traitement/TraitementClient.php">

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="nom" id="firstName" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstName">Nom</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="prenom" id="lastName" class="form-control form-control-lg" />
                                        <label class="form-label" for="lastName">Prènom</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <div class="col-12">
                                            <input type="email" name="mail" id="emailAddress" class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                      </div>
                                    </div>
                                 </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="password" name="password" id="phoneNumber" class="form-control form-control-lg" />
                                        <label class="form-label" for="phoneNumber">Password</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" name="action" value="Sign Up" />
                                Got an account? <a href="LoginVendeur.php">Sign in here.</a>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>