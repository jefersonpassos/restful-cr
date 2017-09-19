<?php

require_once __DIR__.'/../controllers/ticket.controller.php';


//controller to tickets
$ticket = new Ticket($app);

$app->post('/ticket', function () use($ticket, $app){
    $ticket->newTicket();
});

$app->get('/tickets', function () use($ticket, $app){
    $app->log->info("Slim-Skeleton '/ticket' route");
    $ticket->getTickets();
});
