<?php

session_start();

function redirect($page){
    header("Location:" .$page);
}

function flash($name = '', $message = ''){
    if(!empty($name)){
        if(!empty($message)){
            if(isset($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            $_SESSION[$name] = $message;
        }else{
            if($_SESSION[$name]){
                echo "<div class='alert alert-success'>".$_SESSION[$name]."</div>";
                unset($_SESSION[$name]); 
            }  
        }
    }
} 

function setSession($user){
    $_SESSION['current_user'] = $user;

}

function getSession(){
    if(isset($_SESSION['current_user'])){
        return $_SESSION['current_user'];
    }else{
        return false;
    }
}

function unsetSession(){
    unset($_SESSION['current_user']);
}


