<?php



class DB
{
    protected $connection;
    protected $default_sql;
    
    //connect in database
    protected function connect(){
        return oci_connect(DB_USER, DB_PASS, DB_HOST, 'AL32UTF8');
    }
    
    
    //  query execute
    protected function exec($sql){
        $this->connection = $this->connect();
        
        $default_sql = "ALTER SESSION SET NLS_DATE_FORMAT = 'yyyy-mm-dd hh24:mi'";
        $exec = oci_parse( $this->connection , $default_sql );
        oci_execute( $exec );
        
        $exec = oci_parse( $this->connection , $sql );
        oci_execute( $exec );
        return $exec;
    }
    
    // find on sql query
    public function query($sql){
        return $this->exec($sql);
    }
    
    // create and execute sql query find
    public function find( $table, $cols='*', $options='' ){
        // 
        $sql = 'select '. $cols . ' from '. $table . ' ' . $options;
        
        return $this->exec($sql);
    }
    
    
    // convert query to json
    public function to_json($stid){
        
        $obj = array();
        $obj['data'] = array();
        
        while($row = oci_fetch_array($stid, OCI_ASSOC)){
            array_push($obj['data'], $row);
        }
        
        $obj['_total'] = oci_num_rows($stid);
        
        return json_encode($obj);
    }
    
    // convert query to array
    public function to_array($stid){
        $obj = array();
        $obj['data'] = array();
        
        while($row = oci_fetch_array($stid, OCI_ASSOC)){
            array_push($obj['data'], $row);
        }
        
        $obj['_total'] = oci_num_rows($stid);
        
        return $obj;
    }
    
    
}