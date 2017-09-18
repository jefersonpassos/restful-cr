<?php


require_once __DIR__.'/../db/db.php';
require_once __DIR__.'/../models/user.model.php';

class User extends UserModel
{
 
    public $app;
    protected $db;
    
    public function __construct($app){
        $this->app = $app;
    }
    
    public function getUsers(){
        $stid = UserModel::find();
        echo DB::to_json($stid);
    }
    
    public function getUser($id){
        $resul = UserModel::find($id);
        echo DB::to_json($resul);
    }
    
    public function verify_pass($id, $password){
        $user = new UserModel();
        
        $user->registration = $id;
        $user->username = $id;
        $user->id_u = $id;
        $user->password = $password;
        
    }
    
}