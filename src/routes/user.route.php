<?php


require_once __DIR__.'/../controllers/user.controller.php';

$user = new User($app);

$app->get('/users', function() use ($user, $app){
    $user->getUsers();
});

$app->get('/user/:id', function ($id) use($user, $app){
    $user->getUser($id);
});