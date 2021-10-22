<?php declare(strict_types=1);

namespace mzb\Db;

use mzb\Db\Connection;

class QueryBuilder
{
    private $connection;
    private $query;
    
    public function from(string $name, string $alias = null): QueryBuilder
    {
        $this->query .= "FROM $name";
        $this->query .= $alias ? " AS $alias" : '';
        
        return $this;
    }


    public function toSQL($query): string
    {
        $this->query = $query;
        return $query;
    }
}
