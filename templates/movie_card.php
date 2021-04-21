<?php
    
    
?>

<div class="card movie-card">
    <div class="card-img-top" style="background-image:url('img/movies/movie_cover.jpg')"> </div>
                    
    <div class="card-body">
        <p class="card-rating">
            <i class="fa fa-star"></i>
            <span rating="">9</span>
        </p>
        <h5 class="card-title">
            <a href="<?= $BASE_URL?>movie.php?id=<?= $movie->id?>"> <?= $movie->title ?> </a>
        </h5>
        <a href="<?= $BASE_URL?>movie.php?id=<?= $movie->id?>" class="btn btn-primary rate-btn"> Avaliar</a>
        <a href="<?= $BASE_URL?>movie.php?id=<?= $movie->id?>" class="btn btn-primary card-btn"> Conhecer</a>
    </div>
 </div>