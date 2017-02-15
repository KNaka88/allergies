<?php


    require_once "src/AllergyScore.php";

    class AllergyScoreTest extends PHPUnit_Framework_TestCase
    {

        function test_allergy_score()
        {
            //Arrange
            $user_score = "3";
            $test_allergies = new AllergyScore();

            //Act
            $result = $test_allergies->allergies($user_score);

            //Assert
            $this->assertEquals("0 0 0 0 0 0 1 1", $result);
        }

    }
