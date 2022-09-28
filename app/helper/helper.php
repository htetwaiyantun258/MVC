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

function setCurrentId($value){
if (isset($_SESSION['currentId'])) {
    unset($_SESSION['currentId']);
}
    $_SESSION['currentId'] = $value;
}

function getCurrentId(){
    if(isset($_SESSION['currentId']))
    {
        return $_SESSION['currentId'];
    }
}
function deleteCurrentId(){
    if(isset($_SESSION['currentId'])){
        unset($_SESSION['currentId']);
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


