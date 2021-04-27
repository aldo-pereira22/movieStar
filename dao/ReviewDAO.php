<?php

require_once("models/Review.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");


    class ReviewDAO implements ReviewDAOInterface{

        private $conn;
        private $url;
        private $message;


        public function __construct(PDO $conn, $url){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);

        }


                
        public function buildReview($data){

            $revierwObject = new Review();


            $revierwObject->id = $data["id"];
            $revierwObject->rating = $data["rating"];
            $revierwObject->review = $data["review"];
            $revierwObject->users_id = $data["users_id"];
            $revierwObject->movies_id = $data["movies_id"];


            return $revierwObject;

        }

        public function create(Review $review){

        }

        public function getMoviesReviews($id){

        }

        public function hasAlreadyReviewed($id, $user_Id){

        }
        
        public function getRatings($id){

        }

    }




?>