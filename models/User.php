<?php

    class User {
        public $id;
        public $name;
        public $lastname;
        public $email;
        public $password;
        public $img;
        public $bio;
        public $token;
    




    }


    interface UserDAOInterface{

        public function buildUser($data);
        public function create(User $user, $authUser=false);
        

    }

?>