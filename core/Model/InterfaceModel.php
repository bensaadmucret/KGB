<?php declare(strict_types=1);

namespace Core\Model;

interface InterfaceModel{

    /**
     * return all rows from a table
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
    public function getOne($id, $table);
 

    /**
     * Undocumented function
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
    public function update($data, $table, $id);
  

    /**
     * delete a row in the database
     *
     * @param [type] $id
     * @param [type] $table
     * @return void
     * @throws \PDOException
     * @author : Mohammed Bensaad
     */
    public function delete($id, $table);



}