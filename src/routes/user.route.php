<?php


require_once __DIR__.'/../controllers/user.controller.php';

$user = new User($app);

$app->get('/users', function() use ($user, $app){
    $user->getUsers();
});

$app->get('/user/:id', function ($id) use($user, $app){
    $user->getUser($id);
});

$app->post('/user', function() use ($user, $app){
    $data = $app->request->getBody();
    $data = json_decode($data, true);
    $user->registerUser($data);
});

$app->post('/user/auth', function () use ($user, $app){
    $data = $app->request->getBody();
    $data = json_decode($data);
    $user->auth($data->user, $data->pass);
});