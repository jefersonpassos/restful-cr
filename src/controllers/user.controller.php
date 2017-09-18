<?php


require_once __DIR__.'/../db/db.php';
require_once __DIR__.'/../models/user.model.php';

class User extends DB
{
 
    public $app;
    protected $db;
    
    public function __construct($app){
        $this->app = $app;
    }
    
    public function getUsers(){
        $stid = DB::find(UserModel::table, $cols='NAME, TYPE, TEAM, ID_U, EMAIL, USERNAME, CELULAR');
        echo DB::to_json($stid);
    }
    
    public function getUser($id){
        $user = new UserModel();
        
        $user->registration = $id;
        $user->username = $id;
        $user->id_u = $id;
        
        $resul = $user->find();
        echo DB::to_json($resul);
    }
    
}