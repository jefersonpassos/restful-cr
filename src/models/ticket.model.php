<?php

require_once __DIR__.'/../db/db.php';


class TicketModel extends DB
{
    const table = "CR_TICKETS";
    
    public function find($id=null){
        
        $options = '';
        
        if($id != null)
            $options = "where ticket_id = '$id'";
        
        $resul = DB::find($this::table, $cols='*', $options);
        
        return $resul;
    }
}