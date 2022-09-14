<?php

class Category extends Controller{

    public function __construct(){
        $this->Cate = $this->model('CategoryModel');
    }

    function create($data = [])
    {
        $data = [
            "name" => "",
            "name_err"=>"",
            "cats" => $this->Cate->getAllCategory()
            ];
        
        if ($_SERVER['REQUEST_METHOD'] =='POST') { 

            $data["name"] = $_POST["name"];
            
            if(empty($data['name'])){
                $data['name_err'] = "Supply Category name";
                $this->view('admin/Category/cat_home', $data);
            }else{
                if($this->Cate->getCategoryByName($data['name'])){
                    $data['name_err'] = " Category name is already taken";
                    $this->view('admin/Category/cat_home', $data);

                }else{
                    if($this->Cate->insertCategory($data['name'])){
                        $data['cats'] = $this->Cate->getAllCategory();
                        flash('success_Category', 'Category added successfully');
                        $this->view('admin/Category/cat_home', $data);

                    }else{
                        flash('error_Category','category is fail');
                        redirect(URLROOT .'admin/Category/cat_home');
                        
                    }
                    
                }

            }
        } else {
            $this->view("admin/Category/cat_home", $data);
        }
    }
}