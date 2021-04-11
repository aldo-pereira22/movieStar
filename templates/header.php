<?php 
    require_once("globals.php");
    require_once("db.php");
    $flassMessage = [];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Stars</title>

    <!-- ICON -->
    <link rel="short icon" href="<?=$BASE_URL ?>img/moviestar.ico">

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.css"
    integrity="sha512-Mg1KlCCytTmTBaDGnima6U63W48qG1y/PnRdYNj3nPQh3H6PVumcrKViACYJy58uQexRUrBqoADGz2p4CdmvYQ=="
    crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?=$BASE_URL?>css/style.css">
   



</head>
<body>
    
    <header> 
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?=$BASE_URL ?>" class="navbar-brand">
                <img src="<?= $BASE_URL ?>img/logo.svg" alt="MovieStar" id="logo">
                <span id="moviestar-title"> MovieStar</span>
            </a>

            <button class="navbar-toggler" type="button" data-toogle="collapse" data-target="#navbar"
            aria-controls="navbar"aria-expanded="false" aria-lable="Togglenavigation"> <i class="fas fa-bars"> </i> </button>

            <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
                <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search"
                    placeholder="Buscar Filmes" arial-label="Search" >

                <button class="btn my-2 my-sm-0" type="submit">
                    <i class="fas fa-search" ></i>
                </button>
            </form>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item" > <a href="<?= $BASE_URL ?>auth.php" class="nav-link"> Entrar/Cadastrar </a> </li>

                </ul>
            </div>
        </nav>
    </header>


<?php if(!empty($flassMessage["msg"])): ?>

    <div class="msg-container">
        <p class="msg <?= $flassMessage["type"] ?>">
        <?= $flassMessage["msg"] ?>
        </p>
    </div>


<?php endif; ?>
