<?php
    require_once("globals.php");
    require_once("db.php");   
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);


    //Resgata  o tipo de formulário
    $type = filter_input(INPUT_POST, "type");
    
    echo $type;

    // Verificação do Tipo de formulário
    if($type === "register"){
        $name = filter_input(INPUT_POST, "name");
        $lastname = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmapassword = filter_input(INPUT_POST, "confirmapassword");


        // Verificação dos dados necessários
        if($name && $lastname && $email && $password){

        }else {
            //Enviar mensagem de erro, de dados que estejam faltando
            $message->setMessage("Por favor, preencha todos os campos.", "Error", "back");
        }
        


        
 


    }else if($type === "login") {

    }

?>