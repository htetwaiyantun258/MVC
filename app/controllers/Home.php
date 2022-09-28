<?php
error_reporting(E_PARSE | E_ERROR | E_WARNING);

class Home extends Controller{
    public function __construct(){

        $this->UserModel = $this->model("UserModel");
    
    }
    public function index($data = []){
        // $data =$this->UserModel->getAllUser();
        $this->view("home/index",$data);
    }
   
}