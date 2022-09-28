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

        public function edit($data=[]){
            $dta=[
                "name"=>"",
                "name_err"=>"",
                "cats"=>"",
                "currentCat"=>""
            ];
            $dta['cats'] = $this->Cate->getAllCategory();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $dta["name"] = $_POST["name"];
                if(!empty($dta["name"])){
                    $id = getCurrentId();
                    if($this->Cate->updateCategory($id,$dta["name"])){
                    deleteCurrentId();
                    redirect(URLROOT .'/Category/create');

                    }else{
                    deleteCurrentId();
                        $dta['currentCat'] = $this->Cate->getCategoryId();
                        flash("cat_edit_failed","Category update Fail");
                        redirect(URLROOT.'/admin/Category/cat_edit',$dta);
                    }
                }else{
                    $dta["name_err"] = "Category Name must supply!";
                    $dta["currentCat"] = $this->Cate->getCategoryId(getCurrentId());
                    deleteCurrentId();
                    $this->view("admin/Category/cat_edit",$dta);
                }

            }else{
                
                setCurrentId($data[0]);
                $dta['currentCat'] = $this->Cate->getCategoryId($data[0]);
                $this->view("admin/Category/cat_edit",$dta);

                
            }
        }

        public function delete($data=[]){
                $id = $data[0];
              if($this->Cate->delete($id)){
                redirect(URLROOT ."/Category/create");   
            }else{
                redirect(URLROOT ."/Category/create");
            }
        }
}