<?php

session_start();

function flash($name = '', $message = ''){
    if(!empty($name)){
        if(!empty($message)){
            if(isset($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            $_SESSION[$name] = $message;
        }else{
            echo "<div class='alert alert-success'>".$_SESSION[$name]."</div>";
            unset($_SESSION[$name]); 
        }
    }
} 