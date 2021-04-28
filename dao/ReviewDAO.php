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

            $stmt = $this->conn->prepare("INSERT INTO reviews (

                rating, review, movies_id, users_id

            ) VALUES (
                :rating, :review, :movies_id, :users_id


            ) ");

            $stmt->bindParam(":rating", $review->rating);
            $stmt->bindParam(":review", $moreviewvie->review);
            $stmt->bindParam(":movies_id", $review->movies_id);
            $stmt->bindParam(":users_id", $review->users_id);
            $stmt->execute();
            $this->message->setMessage("Comentário adicionado com sucesso!", "success", "index.php");

        }


        

        public function getMoviesReviews($id){
            $reviews = [];
            $stmt = $this->conn->prepare("SELECT  *FROM  reviews WHERE movies_id = :movies_id");
            $stmt->bindParam(":movies_id", $id);

            $stmt->execute();
            if($stmt->rowCount() > 0){

                $reviewsData = $stmt->fetchAll();

                foreach($reviewsData as $review){
                    $reviews = $this->buildReview($review);
                }

                
                return $reviews;
            }


        }

        public function hasAlreadyReviewed($id, $user_Id){

        }
        
        public function getRatings($id){

        }

    }




?>