<?php

require_once "../app/configs/configs.php"; //database configs
require_once "../app/helper/helper.php";


// require_once "../app/libs/Core.php";  //get url  and request => url editings
// require_once "../app/libs/Controller.php"; // request data controll 
// require_once "../app/libs/Database.php";  // model => data control

spl_autoload_register(function ($className){
    require_once "../app/libs/".$className.".php";
});

//ဒီမှာအလုပ်လုပ်သမျှတွေကို public -> index.phpကအလုပ်လုပ်နေတယ် ထင်တာပဲ

