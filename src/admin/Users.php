<?php

use mzb\Db\Connection;

class Users{

    private $db;
    
    public function __construct(){
        $this->db =   Connection::get()->connect(); 
    }
    
    public function getUsers(){
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }
    
    public function getUser($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function addUser($data){
        $this->db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function updateUser($data){
        $this->db->query("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function deleteUser($id){
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}