<?php

require_once __DIR__.'/../db/db.php';

class Ticket {
    
    public $app;
    protected $db;
    
    function __construct($app){
        $this->app = $app;
        $this->db = new db();
    }
    
    //registra um novo ticket
    public function newTicket(){
        
        $data = $this->app->request->getBody();
        
        $data = json_decode($data, true);
        
        return $data;
    }
    
    public function getTickets(){
        // $stid = $this->db->query('select * from CR_TICKETS');
        // find(<table>, <options>, <cols>)
        // options and cols optionals
        $stid = $this->db->find( $table='cr_tickets' );
        
        echo $this->db->to_json($stid);
        $this->app->response->setStatus(200);
    }
    
     
    
    
    
}

?>