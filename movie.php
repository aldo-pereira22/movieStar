<?php
    require_once("templates/header.php");


    // Verifica se usuário está autenticado
    require_once("models/Movie.php");
    require_once("dao/MovieDAO.php");


    //Pegar o ID do filme

    $id = filter_input(INPUT_GET, "id");

    $movie;

    $movieDao = new MovieDAO($conn, $BASE_URL);
    
    if(empty($id)){
        $message->setMessage("O filme não foi encontrado!", "error", "index.php");

    }else {
        $movie = $movieDao->findById($id);

        //Verifica se o filme existe

        if(!$movie){

            $message->setMessage("O filme não foi encontrado!", "error", "index.php");


        }
    }

    //Checar se o filme tem imagem

    if($movie->image == "") {
        $movie->image = "movie_cover.jpg";
      }
    //Checar se o filme é do usuário
    $userOwnsMovie = false;

    if(!empty($userData)){
        if($userData->id === $movie->users_id){
            $userOwnsMovie = true;
        }
    }

    $alreadyReviewed = false;
    //Resgatar os filmes
?>

<div id="main-container" class="container-fluid">
    <div class="row">
        <div class="offset-md-1 col-md-6 movie-container">
            <h1 class="page-title"> <?= $movie->title?> </h1>
            <p class="movie-datails">
                <span> <?= $movie->length ?></span>
                <span class="pipe"></span>
                <span> <?= $movie->category ?></span>
                <span class="pipe"></span>
                <span> 9 <i class="fa fa-star"></i></span>


            </p>

            <iframe src="<?= $movie->trailer ?>"  width="560" height="315" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encryted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p> <?= $movie->description ?> </p>
            
        </div>

        <div class="col-md-4">
            <div class="movie-image-container" style="background-image: url('<?= $BASE_URL?>/img/movies/<?= $movie->imgage?> ')" ></div>
        </div>
        <div class="offset-md-1 col-md-10" id="reviews-container">
            <h3 id="reviews-title">Avaliações</h3>
            <!-- Verifica  se habilita  a review para o usuário ou não -->

            <?php if(!empty($userData) && !$userOwnsMovie && !$alreadyReviewed ) :?>
                <div class="col-md-12" id="review-form-container">
                    <h4>Envie sua avaliação:</h4>
                    <p class="page-description">Preencha o formulário com a nota e o comentário sobre o filme</p>
                    <form action="<?= $BASE_URL ?>review_process.php" method="POST" id="review-form" >
                        <input type="hidden" name="type" value="create">
                        <input type="hiden" name="movies_id" value="<?= $movie->id ?>">
                        <div class="form-group">
                            <label for="rating"> Nota do filme: </label>
                            <select name="rating" id="rating" class="form-control">
                                <option value=""> Selecione </option>
                                <option value="10"> 10 </option>
                                <option value="10"> 9 </option>
                                <option value="10"> 8 </option>
                                <option value="10"> 7 </option>
                                <option value="10"> 6 </option>
                                <option value="10"> 5 </option>
                                <option value="10"> 4 </option>
                                <option value="10"> 3 </option>
                                <option value="10"> 2 </option>
                                <option value="10"> 1 </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="review"> Seu comentário:</label>
                            <textarea name="review" id="review" rows="3" class="form-control" placeholder="O que vc achou do filme ?" ></textarea>
                        </div>
                        <input type="submit" class="btn card-btn " value="Enviar Comentário" >
                    </form>
                </div>
            <?php endif; ?>
            <!-- Comentários -->
            <div class="col-md-12 review">
                <div class="row">
                    <div class="col-md-1">
                        <div class="profile-image-container review-image" stype="background-image:url()'<?= $BASE_URL?>img/users/user.png"></div>
                    </div>
                    <div class="col-md-9 author-details container">
                        <h4 class="author-name"> <a href="$"> Aldo teste</a> </h4>
                        <p> 9 <i class="fas fa-star"></i></p>
                    </div>

                    <div class="col-md-12">
                        <p class="comment-title">Comentário</p>
                        <p>Este é um comentário do usuário</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 review">
                <div class="row">
                    <div class="col-md-1">
                        <div class="profile-image-container review-image" stype="background-image:url()'<?= $BASE_URL?>img/users/user.png"></div>
                    </div>
                    <div class="col-md-9 author-details container">
                        <h4 class="author-name"> <a href="$"> Aldo teste</a> </h4>
                        <p> 9 <i class="fas fa-star"></i></p>
                    </div>

                    <div class="col-md-12">
                        <p class="comment-title">Comentário</p>
                        <p>Este é um comentário do usuário</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

    require_once("templates/footer.php");
?>