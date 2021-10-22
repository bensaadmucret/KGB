<?php declare(strict_types=1);


namespace mzb\Model;

use mzb\Model\UserModel;

use mzb\Db\Connection as DbConnection;

abstract class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = DbConnection::get()->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_administrateur = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $fields = implode(',', $keys);
        $values = ':' . implode(',:', $keys);
        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        $stmt->execute();
        //return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "{$key} = :{$key}";
        }
        $fields = implode(',', $fields);
        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        return $stmt->execute();
    }


    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setName($name)
    {
        $this->nom = $name;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
   
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function save()
    {
        if ($this->emailExist($this->email)) {
            return false;
        }
       
        return $this->insert($this->getData());
    }

    public function emailExist(string $email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getData()
    {
        return [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'password_admin' => $this->password,
        ];
    }

    

  

    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;
    }

   

    public function getAllBy($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = :{$field}";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':' . $field, $value);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBy($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = :{$field}";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':' . $field, $value);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getByFields($fields)
    {
        $sql = "SELECT * FROM {$this->table} WHERE ";
        $where = [];
        foreach ($fields as $key => $value) {
            $where[] = "{$key} = :{$key}";
        }
        $sql .= implode(' AND ', $where);
        $stmt = $this->db->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindParam(':' . $key, $value);
        }
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
