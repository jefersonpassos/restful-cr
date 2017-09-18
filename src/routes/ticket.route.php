<?php


require_once __DIR__.'/../controllers/ticket.controller.php';


//controller to tickets
$ticket = new Ticket($app);


$app->get('/ticket', function () use($ticket, $app){
    $app->log->info("Slim-Skeleton '/ticket' route");
    $ticket->getTickets();
});
