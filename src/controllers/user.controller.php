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
    
    public function registerUser($data){
        $user = new UserModel();
        $user->name = $data['name'];
        $user->type = $data['type'];
        $user->team = $data['team'];
        $user->email = $data['email'];
        $user->username = $data['username'];
        $user->celular = $data['celular'];
        $user->sub_team = $data['sub_team'];
        $user->matricula = $data['matricula'];
        
        $user->save();
    }
    
    public function auth($id, $password){
        
        if(UserModel::auth($id, $password))
            echo UserModel::find($id);
        else
            $this->app->response->setStatus(401);
    }
    
}