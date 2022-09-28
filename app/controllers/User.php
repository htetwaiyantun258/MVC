<?php

class User extends Controller
{
    public function __construct()
    {
      $this->UserModel = $this->model("UserModel");
      

    }
    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = $_POST;
            $data = [
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "password" => $_POST["password"],
                "confirm_password" => $_POST["confirm_password"],
                "name_err" => '',
                "email_err" => '',
                "password_err" => '',
                "confirm_password_err" => '',
            ];

            if (empty($data['name'])) {
                $data['name_err'] = "User Name must be supply!";
            }
            if (empty($data['email'])) {
                $data['email_err'] = "Email must be supply!";
            }else{
              if($this->UserModel->getUserEmail($data["email"])){
                $data['email_err'] = "Email is already taken!";
              }
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Password must be supply!";
            }
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Confirm Password must be supply!";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "password do not must match!";
                }
            }
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {   
              if($this->UserModel->register($data["name"], $data["email"], $data["password"])){
                flash("register","Register success, please login!");
                $this->view("user/login");
              }else{
                echo "not good";
              }
            }else {
              $this->view("user/register", $data);
          }
        }else {
          $this->view("user/register");
      } 
    }

    
    public function login()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_POST = $_POST;
        $data = [
           
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "email_err" => '',
            "password_err" => '',
        ];

        
        if (empty($data['email'])) {
            $data['email_err'] = "Email must be supply!";
        }
        if (empty($data['password'])) {
            $data['password_err'] = "Password must be supply!";
        }
        
        if ( empty($data['email_err']) && empty($data['password_err']) ) {
          $userRow = $this->UserModel->getUserEmail($data['email']);
          if($userRow){
            $hashpass = $userRow->password;
            setSession($userRow);
            if(password_verify($data['password'], $hashpass)){
              flash('login success','Welcome! You have successfully');
              redirect(URLROOT .'/admin/home');

            }else{
              flash('login fail','fail login user');
              $this->view('user/login'); 
            }
          }else{
            $data['email_err'] = "Email Error";
          }
        }else {
          $this->view("user/login", $data);
      }
    }else {
      $this->view("user/login");
  } 
    }

    public function logout(){
      unsetSession();
      $this->view("home/index");
    }
}
