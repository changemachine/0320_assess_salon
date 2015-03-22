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

        // ADD CLIENT AND DISPLAY ALL ON INDEX
    $app->post('/new_client', function() use($app){
        //$stylist_id = $_POST['stylist_id']; don't forget, add to new obj
        $client_name = $_POST['client_name'];
        $contact = $_POST['contact'];
        $client = new Client($client_name, $contact);
        $client->save();
        return $app['twig']->render('index.twig', array('clients' => Client::getAll()));
    });

    $app->post('/delete_clients', function() use($app){
        Client::deleteAll();
        return $app['twig']->render('index.twig', array('clients' => Client::getAll()));
    });

    // $app->get('/new_stylist', function() use($app){
    //     return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    // });
    //
    // // Add stylist, display all on the home page
    // $app->post('/new_stylist', function() use($app){
    //     $name = $_POST['name'];
    //     $id = null;
    //     $stylist = new Client($id, $name);
    //     $stylist->save();
    //     return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    // });


    //
    // $app->get('/clients', function() use($app){
    //         return $app['twig']->render('clients.twig', array('clients' =>))
    // });

    return $app;


?>
