<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //HOME
    $app->get('/', function() use($app){
        return $app['twig']->render('index.twig', array('clients' => Client::getAll()));
    });

        // Add client, display all on the home page
    $app->post('/', function() use($app){
        $id = $_POST['id'];
        $client_name = $_POST['client_name'];
        $client = new Client($id, $client_name);
        $client->save();
        return $app['twig']->render('index.twig', array('clients' => Client::getAll()));
    });


    //
    // $app->get('/clients', function() use($app){
    //         return $app['twig']->render('clients.twig', array('clients' =>))
    // });

    return $app;


?>
