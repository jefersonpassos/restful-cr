<?php

require '../vendor/autoload.php';


// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
    'mode' => getenv('SLIM_MODE')
));

$app->response->headers->set('Content-Type', 'application/json');

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get('/', function () use ($app) {
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    // Render index view
    $app->render('index.html');
});


//ticket routes
include '../src/routes/ticket.route.php';

//users route
include '../src/routes/user.route.php';

// Run app
$app->run();
