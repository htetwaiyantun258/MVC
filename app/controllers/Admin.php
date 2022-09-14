<?php


class Admin extends Controller{
    // public function __construct()
    // {
    //     $this->adminModel = $this->Model("AdminModel");
    // }
    public function home(){
        $this->view('admin/home');
    }
}