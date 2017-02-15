<?php
    class AllergyScore
    {


        private $eggs;
        private $peanuts;
        private $shellfish;
        private $strawberries;
        private $tomatoes;
        private $chocolate;
        private $pollen;
        private $cats;


        function __construct()
        {
            $this->eggs = 0;
            $this->peanuts = 0;
            $this->shellfish = 0;
            $this->strawberries = 0;
            $this->tomatoes = 0;
            $this->chocolate = 0;
            $this->pollen = 0;
            $this->cats = 0;
        }

        function get($property)
        {
            return $this->$property;
        }

        function set($property, $value)
        {
            $this->property = $value;
        }

        function save() {
            $_SESSION["list_of_allergies"] = $this;
        }

        function allergies($user_score) //given 1.24 125
        {
            $user_score = intval($user_score);

            if($user_score > 0){
                //Cats
                if($user_score / 128 >= 1){
                    $this->cats = floor($user_score / 128);
                    $this->allergies($user_score % 128);

                //use pollen
                }else if($user_score / 64 >= 1){
                    $this->pollen = floor($user_score / 64); //2
                    $this->allergies($user_score % 64); //4

                //user chocolate
                }else if($user_score / 32 >= 1){
                    $this->chocolate = floor($user_score / 32);
                    $this->allergies($user_score % 32);

                //tomatoes
                }else if($user_score / 16 >= 1){
                    $this->tomatoes = floor($user_score / 16);
                    $this->allergies($user_score % 16);

                //strawberries
                }else if($user_score / 8 >= 1){
                        $this->strawberries = floor($user_score / 8);
                        $this->allergies($user_score % 8);

                //sHELLFISH
                }else if($user_score / 4 >= 1){
                        $this->shellfish = floor($user_score / 4);
                        $this->allergies($user_score % 4);

                //PEANUTS
                }else if ($user_score / 2 >= 1){
                        $this->peanuts = floor($user_score / 2);
                        $this->allergies($user_score % 2);
                }else {
                    $this->eggs = $user_score;
                }

                return $this->cats . " " . $this->pollen . " " . $this->chocolate . " " . $this->tomatoes . " " . $this->strawberries . " " . $this->shellfish . " " . $this->peanuts . " " . $this->eggs;
            }
        }
    }
