<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/AllergyScore.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
    "twig.path" => __DIR__."/../views"
    ));

    $app['debug'] = true;

    session_start();
    if (empty($_SESSION['list_of_allergies'])){
        $_SESSION['list_of_allergies'] = array();
    }

    $app->get("/", function() use($app) {

        return $app["twig"]->render("allergy_form.html.twig");
    });

    return $app;
