<?php
    require_once("templates/header.php");


    

?>

    <div id="main-container" class="container-fluid"> 

        <h2 class="section-title"> Filme Novos</h2>   
        <p class="section-description">Veja as críticas dos últimos filmes adicionados no movieStar</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image:url('<?= $BASE_URL?>'img/movies/movie_cover.jpg)"> </div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fa fa-star"></i>
                        <span rating="">9</span>
                    </p>
                    <h5 class="card-title"> <a href="#"> Título do Filme</a> </h5>
                    <a href="#" class="btn btn-primary rate-btn"> Avaliar</a>
                    <a href="#" class="btn btn-primary card-btn"> Conhecer</a>

                </div>
            </div>
        </div>

        <h2 class="section-title"> Ação</h2>   
        <p class="section-description">Veja os melhores filmes de Ação!</p>
        <div class="movies-container">
        
        </div>

        <h2 class="section-title"> Comédia</h2>   
        <p class="section-description">Veja os melhores filmes de comédia!</p>
        <div class="movies-container">
        
        </div>

    </div>


<?php
    require_once("templates/footer.php")

?>
