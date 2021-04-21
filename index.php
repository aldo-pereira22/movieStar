
<?php
   require_once("templates/header.php");
    require_once("dao/MovieDAO.php");
   
 
   // DAO dos filmes
   $movieDao = new MovieDAO($conn, $BASE_URL);

   $latestMovies = $movieDao->getLatesMovies();

 

    $actionMovies = $movieDao->getMoviesByCategory("ação");

    $comedyMovies = $movieDao->getMoviesByCategory("Comédia");


?>

    <div id="main-container" class="container-fluid"> 
        
        <h2 class="section-title"> Filme Novos</h2>   
        <p class="section-description">Veja as críticas dos últimos filmes adicionados no movieStar</p>
        <div class="movies-container">
            <?php foreach($latestMovies as $movie): ?>
                <?php require("templates/movie_card.php") ?>
            <?php  endforeach; ?>

            <?php if(count($latestMovies) === 0): ?>
                <p class="empyt-list"> Ainda não há filmes cadastrados!</p>
            <?php endif; ?>
            
        </div>

        <h2 class="section-title"> Ação</h2>   
        <p class="section-description">Veja os melhores filmes de Ação!</p>
        <div class="movies-container">
        <?php foreach($actionMovies as $movie): ?>
                <?php require("templates/movie_card.php") ?>
            <?php  endforeach; ?>
        <?php if(count($actionMovies) === 0): ?>
                <p class="empyt-list"> Ainda não há filmes de açao cadastrados!</p>
            <?php endif; ?>
        </div>

        <h2 class="section-title"> Comédia</h2>   
        <p class="section-description">Veja os melhores filmes de comédia!</p>
        <div class="movies-container">
        <?php foreach($comedyMovies as $movie): ?>
                <?php require("templates/movie_card.php") ?>
            <?php  endforeach; ?>
        <?php if(count($comedyMovies) === 0): ?>
                <p class="empyt-list"> Ainda não há filmes de comédia cadastrados!</p>
            <?php endif; ?>
        </div>

    </div>


<?php
    require_once("templates/footer.php")

?>
