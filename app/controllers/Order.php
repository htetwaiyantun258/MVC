<?php
error_reporting(E_ALL);


class Order extends Controller
{
    public function __construct(){
        echo "I am constructor of " .__class__." Name<br>";

    }
    public function index(){
        echo "I am index method of" .__class__ . " Name<br>";

    }
    public function item($meta= []){
        echo "I am item method of" .__class__ . " Name<br>";
        echo "<pre> I am Data ".print_r($meta,true)."</pre>";

    }

   
}