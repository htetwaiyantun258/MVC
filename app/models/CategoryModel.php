<?php

class CategoryModel{
    private $db;
    public function __construct(){
        $this->db = new Database();

    }
    public function getAllCategory(){
        $this->db->query("SELECT *  FROM category");
        return $this->db->multipleSet();

    }

    public function getCategoryByName($name){
        $this->db->query("SELECT * FROM category WHERE name=:name");
        $this->db->bind(":name",$name);
        if($this->db->singleSet()){
            return true;
        }else{
            return false;
        }
    }

    public function insertCategory($name){
        $this->db->query("INSERT INTO category (name) VALUES (:name)");
        $this->db->bind(":name",$name);
        return $this->db->execute();
        }

    public function getCategoryId($id){
        $this->db->query("SELECT * FROM category WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }

    public function updateCategory($id,$name){
        $this->db->query("UPDATE category SET name=:name WHERE id=:id");
        $this->db->bind(":name",$name);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }

    public function delete($id){
        $this->db->query("DELETE FROM category WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
}