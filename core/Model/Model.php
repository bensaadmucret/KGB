<?php declare(strict_types=1);

namespace Core\Model;


class Model
{

    private $connection;
    public function __construct()
    {
        $this->connexion = Connection::get()->connect();
    }
  

    /**
     * return all rows from a table
     * @param string $table
     * @return array
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */   
    public function getAll($table){
        try {
            $query = $this->connexion->prepare("SELECT * FROM $table");
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            throw new \Exception("Error connecting to the database: " . $e->getMessage());
        }
               

    }

    /**
     * Return a single row from the database
     *
     * @param [type] $id
     * @param [type] $table
     * @return void
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function getOne($id, $table){
        try {
            $query = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id");
            $query->execute([
                'id' => $id
            ]);
            $result = $query->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            throw new \Exception("Error connecting to the database: " . $e->getMessage());
        }
        
    }

    /**
     * Undocumented function
     *
     * @param [type] $data
     * @param [type] $table
     * @return void
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function insert($data, $table)
    {
        try {
        $query = $this->connexion->prepare('INSERT INTO '. $table .'('. implode(',', array_keys($data)) .') VALUES (:'. implode(', :', array_keys($data)) .')');
        $query->execute($data);
        return $this->connexion->lastInsertId();
        } catch (\PDOException $e) {
            throw new \Exception("Error connecting to the database: " . $e->getMessage());
        }
        
    }

    /**
     * Update a row in the database
     *
     * @param [type] $data
     * @param [type] $table
     * @param [type] $id
     * @return void
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function update($data, $table, $id)
    {
        try {
            $query = $this->connexion->prepare('UPDATE '. $table .' SET '. implode(' = :', array_keys($data)) .' = :'. implode(' = :', array_keys($data)) .' WHERE id = :id');
            $query->execute($data);
            return $this->connexion->lastInsertId();
        } catch (\PDOException $e) {
            throw new \Exception("Error connecting to the database: " . $e->getMessage());
        }
  
    }

    /**
     * delete a row in the database
     *
     * @param [type] $id
     * @param [type] $table
     * @return void
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function delete($id, $table)
    {       try{
            $query = $this->connexion->prepare('DELETE FROM '. $table .' WHERE id = :id');
            $query->execute([
                'id' => $id
            ]);
            return $query->rowCount();
        } catch (\PDOException $e) {
            throw new \Exception("Error connecting to the database: " . $e->getMessage());
        }  
            

    }


}