<?php
    require_once("templates/header.php");


    // Verifica se usuário está autenticado
    require_once("models/User.php");
    require_once("dao/UserDAO.php");
    require_once("dao/MovieDAO.php");
  
    $user = new User();
    $userDao = new UserDao($conn, $BASE_URL);
  
    $userData = $userDao->verifyToken(true);

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

?>
    <div id="main-container" class="container-fluid">
        
    </div>

<?php
    require_once("templates/footer.php");
?>