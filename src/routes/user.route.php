<?php


require_once __DIR__.'/../controllers/user.controller.php';

$user = new User($app);

$app->get('/user', function() use ($user, $app){
    $app->log->info(" GET '/user' route");
    $user->getUsers();
});

$app->get('/user/:id', function ($id) use($user, $app){
    $app->log->info("GET '/ticket/:id' route");
    $user->getUser($id);
});

$app->post('/user', function() use ($user, $app){
    $app->log->info(" POST '/ticket' route");
    $data = $app->request->getBody();
    $data = json_decode($data, true);
    $user->registerUser($data);
});

$app->post('/auth', function () use ($user, $app){
    $app->log->info(" POST '/auth' route");
    $data = $app->request->getBody();
    $data = json_decode($data);
    $user->auth($data->user, $data->pass);
});