<?php

require_once __DIR__.'/../db/db.php';

class UserModel extends DB
{
    const table = "CR_USERS";
    public $name;
    public $type;
    public $team;
    public $id_u;
    public $password;
    public $email;
    public $username;
    public $celular;
    public $sub_team;
    public $matricula;
    
    public function __construct() {
        $this->id_u = "";
        $this->username = "";
        $ths->matricula = "";
    }
    
    // save user
    public function save(){
        
        $this::id_generate(16);
        $pass = $this::hash_pass($this->password);
          
        $sql = "INSERT INTO '".$this::table."' ( name, type, team, id_u, password, email, username, celular, sub_team, matricula"            ."VALUES('$this->name', '$this->type', '$this->team', '$this->id_u', '$pass', '$this->email', '$this->username', '$this->celular', '$this->sub_team', '$this->matricula')";
    }
    
    // generate id
    public function id_generate($len){
    	$code = "";
    	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    
    	for($i =0; $i < $len; $i++){
    
    		$v1 = substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    		$code  .= $v1;
    	}
    
    	$this->id_u = $code;
    }
    
    // encrypt password
    private function hash_pass($pass){
        $hash_method = "sha256";
        return hash($hash_method, $pass);
    }
    
    public function verify_pass($p_verify, $p_hash){
        if($this->hash_pass($p_verify) == $p_hash)
            return true;
        else 
            return false;
    }
    
    // find users with <id_u> or <username> or <matricula>
    public function find($id=null){
        
        $options = '';
        
        if($id != null)
            $options = "where id_u = '$id' or username = '$id' or matricula = '$id'";
        
        $resul = DB::find($this::table, $cols='NAME, TYPE, TEAM, ID_U, EMAIL, USERNAME, CELULAR', $options);
        
        return $resul;
    }
    
    public function auth($id, $password){
        
        $options="where id_u = '$id' or username = '$id' or matricula = '$id'";
        
        $resul = DB::find($this::table, $cols='password', $options );
        
        echo DB::to_json($resul);
        
        if(oci_num_rows($resul) > 0){
        
            $user = DB::to_array($resul);
            $pass_u = $user->data[0]->password;
        
            return $this->verify_pass($password, $pass_u);
        }
        else 
            return false;
        
    }
    
    
}