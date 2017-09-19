<?php

require_once __DIR__.'/../controllers/ticket.controller.php';


//controller to tickets
$ticket = new Ticket($app);

$app->post('/ticket', function () use($ticket, $app){
    $app->log->info(" GET '/ticket' route");
    $ticket->newTicket();
});

$app->get('/ticket', function () use($ticket, $app){
    $app->log->info("GET '/tickets' route");
    $ticket->getTickets();
});
