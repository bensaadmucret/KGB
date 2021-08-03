<?php

namespace mzb\Model;

use mzb\Db\Connection as DbConnection;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = DbConnection::get()->connect();
    }

    public function query( $table){
        $sql = "SELECT * WHERE .'$table'. ";

    }
}
