<?php


use mzb\Model\BaseModel;

class Users extends BaseModel{

    /**
     * @var string
     */
    public function getUsers(){
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }



    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * @param $data
     * @return bool
     */    
    public function addUser($data):bool{
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
    

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateUser($data):bool{
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
    

    /**
     * @param $id
     * @return bool
     */
    public function deleteUser($id):bool{
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}

