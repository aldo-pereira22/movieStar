<?php
    require_once("globals.php");
    require_once("db.php");   
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);
    $userDao = new UserDAO($conn, $BASE_URL);

    //Resgata  o tipo de formulário
    $type = filter_input(INPUT_POST, "type");


    // Verificação do Tipo de formulário
    if($type === "register"){
        $name = filter_input(INPUT_POST, "name");
        $lastname = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmapassword = filter_input(INPUT_POST, "confirmapassword");


        // Verificação dos dados necessários
        if($name && $lastname && $email && $password){
            
            // Verificaar se as senhas batem
            if($password === $confirmapassword){
                // Verificar se o E-mail ja está cadastrado
                if($userDao->findByEmail($email) === false ){
                    $user = new User();
                    // Criação do token e senha
                    $userToken = $user->generateToken();
                    $finalPassword = $user->generatePassword($password);
                    //Montando o USUÁRIO PARA CADASTRAR NO BANCO DE DADOS
                    $user->name = $name;
                    $user->lastname = $lastname;
                    $user->password = $finalPassword;
                    $user->token = $userToken;
                    $user->email = $email;
                    $auth = true;
                    $userDao->create($user, $auth);

                }else {
                    $message->setMessage("Email ja cadastrado.", "Error", "back");                    

                }

            }else {
                $message->setMessage("As senhas não são iguais.", "Error", "back");
            }
        }else {
            //Enviar mensagem de erro, de dados que estejam faltando
            $message->setMessage("Por favor, preencha todos os campos.", "Error", "back");
        }
        

    }else if($type === "login") {

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        //Tenta autenticar usuário 
        if($userDao->authenticateUser($email, $password) ){

            //Gerar um token e inserir na sessão
            $token = $user->generateToken();
            $this->setTokenToSession($token);

            //Atualizar token no usuário
            $user->token = $token;

            $this->update($user);

            return true;

        //Redireciona o usuário, caso não consiga autenticar
        }else { 

            $message->setMessage("Usuário e/ou senha incorretos", "error", "back");


        }

    }else {
        $message->setMessage("Informações inválidas", "error", "index.php");

    }

?>