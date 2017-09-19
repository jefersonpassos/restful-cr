<?php

require_once __DIR__.'/../db/db.php';
require_once __DIR__.'/../models/ticket.model.php';

class Ticket extends TicketModel{
    
    public $app;
    protected $db;
    
    function __construct($app){
        $this->app = $app;
        $this->db = new db();
    }
    
    //registra um novo ticket
    public function newTicket(){
        $data = $this->app->request->getBody();
        echo $data;
    }
    
    public function getTickets(){
        $resul = TicketModel::find();
        echo DB::to_json($resul);
    }
    
     
    
    
    
}

?>