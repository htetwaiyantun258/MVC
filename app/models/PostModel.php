<?php

class PostModel{

    private $db;

    public function __construct(){

        $this->db = new Database();
    }
    public function getPostById($id){
        $this->db->query("SELECT * FROM post WHERE cat_id=:cat_id");
        $this->db->bind(":cat_id",$id);
        return $this->db->multipleSet();
        
    }
    public function insertPost($cat_id,$title,$description,$image,$content){
        $this->db->query("INSERT INTO post (cat_id,title,description,image,content) VALUES(:cat_id,:title,:description,:image,:content)");
        $this->db->bind(":cat_id",$cat_id);
        $this->db->bind(":title",$title);
        $this->db->bind(":description",$description);
        $this->db->bind(":image",$image);
        $this->db->bind(":content",$content);
        return $this->db->execute();
    }

    public function getPostForId($id){
        $this->db->query("SELECT * FROM post WHERE id = :id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }

    public function updatePost($id,$cat_id,$title,$description,$image,$content){
        $this->db->query("UPDATE post SET cat_id=:cat_id, title=:title, description=:description, image=:image, content=:content WHERE id=:id");
        $this->db->bind(":id",$id);
        $this->db->bind(":cat_id",$cat_id);
        $this->db->bind(":title",$title);
        $this->db->bind(":description",$description);
        $this->db->bind(":image",$image);
        $this->db->bind(":content",$content);
        return $this->db->execute();
    }

    public function deletePost($id){
        $this->db->query("DELETE FROM post WHERE id = :id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}