<?php

class Post extends Controller{

    public function __construct()
    {
        $this->Cate = $this->model("CategoryModel");
        $this->Post = $this->model("PostModel");
    }

    public function create($para = []){
        $data= [
            "cats" =>"",
            "posts" =>"",
        ];
        $data['cats'] = $this->Cate->getAllCategory();
        $data['posts'] = $this->Post->getPostById($para[0]);
        $this->view("admin/Post/home",$data);
    }
    public function createpost($para = []){
        // function place
        $data = [
            'title'=>'',
            'description'=>'',
            'file'=>'',
            'content'=>'',
            'title_err'=>'',
            'desc_err'=>'',
            'file_err'=>'',
            'content_err'=>'',
            'cats'=>'',
            'posts'=>'',
        ];
        $data['cats'] =$this->Cate->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //post method place
            $root = dirname(dirname(dirname(__FILE__)));
            $file = $_FILES['file'];
            
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['content'] = $_POST['content'];
            $data['file'] = $_FILES['file'];

            // error test started
                if(empty($data['title'])){
                    $data['title_err'] = "Title must supply";
                }
                if(empty($data['description'])){
                    $data['desc_err'] = "Description must supply";
                }
                if(empty($data['file'])){
                    $data['file_err'] = "File must supply";
                }
                if(empty($data['content'])){
                    $data['content_err'] = "Content must supply";
                }
            // error test ending
                if(empty($data['title_err']) && empty($data['desc_err']) && empty($data['content_err']) && empty($data['file_err'])){
                    if (!empty($file['name'])) {
                        move_uploaded_file($_FILES['file']['tmp_name'], $root ."/public/assets/upload/".$file['name']);
                        // $bol = $this->Post->insertPost($_POST['cat_id'], $data['title'], $data['description'], $file['name'], $data['content']) ? true : false;
                        // echo $bol;
                        if ($this->Post->insertPost($_POST['cat_id'], $data['title'], $data['description'], $file['name'], $data['content'])){
                           redirect(URLROOT ."/Post/create/1");
                                //this place is successfully post ;
                            
                        }else{
                            // post fail place here;
                            $this->view("admin/Post/createpost", $data);
                        }
                    }else{
                        // file empty is error
                        $this->view("admin/Post/createpost", $data);
                    }
                }else{
                    //this place something is error eg=> title error ,desc error,content error and file error;
                    $this->view("admin/Post/createpost", $data);
                }

            // end status post method place
        }else{
                //get method place
            $this->view("admin/Post/createpost", $data);
            // end status get method place
        }
    }

    public function show($para=[]){
        
            $post = $this->Post->getPostForId($para[0]);
            $this->view("admin/Post/show", ['post' => $post]);
       
        
    }

    public function edit($para = []){
            $data = [
                'title'=>'',
                'description'=>'',
                'file'=>'',
                'content'=>'',
                'title_err'=>'',
                'desc_err'=>'',
                'file_err'=>'',
                'content_err'=>'',
                'cats'=>'',
                
            ];
           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    //post method place
                    $root = dirname(dirname(dirname(__FILE__)));
                    $file = $_FILES['file'];
                    $fileName = $_FILES['file']['name'];

                    $data['title'] = $_POST['title'];
                    $data['description'] = $_POST['description'];
                    $data['content'] = $_POST['content'];
                    $data['file'] = $_FILES['file'];

                    // error test started
                    if (empty($data['title'])) {
                        $data['title_err'] = "Title must supply";
                    }
                    if (empty($data['description'])) {
                        $data['desc_err'] = "Description must supply";
                    }
                    if (empty($data['file'])) {
                        $data['file_err'] = "File must supply";
                    }
                    if (empty($data['content'])) {
                        $data['content_err'] = "Content must supply";
                    }
                    // error test ending
                    if (empty($data['title_err']) && empty($data['desc_err']) && empty($data['content_err']) && empty($data['file_err'])) {
                        if (!empty($file['name'])) {
                            // update file new image using place here
                            move_uploaded_file($_FILES['file']['tmp_name'], $root ."/public/assets/upload/".$file['name']);
                        } else {
                            // file empty => using old image file name
                            $fileName = $_POST['old_file'];
                        }
                        $curId = getCurrentId();
                        deleteCurrentId();
                        if($this->Post->updatePost($curId,$_POST['cat_id'],$data['title'],$data['description'],$fileName,$data['content'])){
                            redirect(URLROOT."/Post/show/". $curId);
                        }else{
                            redirect(URLROOT."/Post/edit/".$curId);
                        }
                    }else {
                        //this place something is error eg=> title error ,desc error,content error and file error;
                        $this->view("admin/Post/createpost", $data);
                    }
                }else{
                    //get here
                    setCurrentId($para[0]);
                    $data['post'] = $this->Post->getPostForId($para[0]);
                    $data['cats'] = $this->Cate->getAllCategory();
                    $this->view("admin/Post/edit", $data);
            }
                
    }
    public function delete($para=[]){
        $data  =[
            "posts"=>"",
            "cats" =>"",

        ];
        if($this->Post->deletePost($para[0])){
            $data["posts"] = $this->Post->getPostById($para[0]);
            $data['cats'] = $this->Cate->getAllCategory();
            redirect(URLROOT."/Post/creat/1");
        }else{
            $data["posts"] = $this->Post->getPostById($para[0]);
            $data['cats'] = $this->Cate->getAllCategory();
            $this->view("admin/Post/home" . $data);
        }
    }


}