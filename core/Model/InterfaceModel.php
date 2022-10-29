<?php declare(strict_types=1);

namespace Core\Model;

interface InterfaceModel{

    /**
     * Return all rows from a table
     * @param string $table
     * @return array
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */   
    public function getAll(string $table);

    /**
     * Return a single row from the database
     *
     * @param [type] $id
     * @param [type] $table
     * @return array
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function getOne( string $table, $id);

   

    /**
     * Insert a row in the database
     *
     * @param [type] $data
     * @param [type] $table
     * @return void
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function insert($data, $table);
 

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
    public function update(string $table, array $data);
  

    /**
     * Delete a row in the database
     *
     * @param [type] $id
     * @param [type] $table
     * @return void
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function delete($id, $table);



}