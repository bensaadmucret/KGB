<?php declare(strict_types=1);

namespace mzb\Db;

use mzb\Db\Connection;

class QueryBuilder
{
    private $query;
    private $params;
    private $types;
  
    private $table;

    private $where;
    private $order;
    private $limit;
    private $offset;
    private $group;
    private $having;
    private $joins;
    private $union;
  
    
    public function __construct()
    {
       
       
           
       
        $this->query = '';
        $this->params = [];
        $this->types = [];

        $this->table = '';
        $this->columns = [];

        $this->where = [];
        $this->order = [];
        $this->limit = null;
        $this->offset = null;
        $this->group = [];
        $this->having = [];
        $this->joins = [];
    }

    public function select(string $table, array $columns = ['*']): self
    {
        $this->table = $table;
        $this->columns = $columns;
        $this->query = 'SELECT ' . implode(', ', $columns) . ' FROM ' . $table;

        return $this;
    }

    public function from (string $table): self
    {
        $this->table = $table;
        $this->query = 'SELECT * FROM ' . $table;
    
        return $this;
    }

    public function table(string $table): QueryBuilder
    {
        $this->table = $table;
        return $this;
    }
    
    public function columns(array $columns): QueryBuilder
    {
        $this->columns = $columns;
        return $this;
    }
    
    public function where( string $query): QueryBuilder
    {
        $this->where = $query;
        return $this;
    }
    
    

    public function order(array $order): QueryBuilder
    {
        $this->order = $order;
        return $this;
    }

    public function limit(int $limit): QueryBuilder
    {
        $this->limit = $limit;
        return $this;
    }
    
    public function offset(int $offset): QueryBuilder
    {
        $this->offset = $offset;
        return $this;
    }
    
    public function group(array $group): QueryBuilder
    {
        $this->group = $group;
        return $this;
    }
    
    public function having(array $having): QueryBuilder
    {
        $this->having = $having;
        return $this;
    }
    
    public function join(string $table, string $on, string $type = 'INNER'): QueryBuilder
    {
        $this->joins[] = [
            'table' => $table,
            'on' => $on,
            'type' => $type,
        ];
        return $this;
    }
    
    public function union(string $type, array $columns, array $where = []): QueryBuilder
    {
        $this->union = [
            'type' => $type,
            'columns' => $columns,
            'where' => $where,
        ];
        return $this;
    }

    public function andWhere(string $column, string $operator, $value): QueryBuilder
    {
        $this->where[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
        ];
        return $this;
    }

    public function execute()
    {
        $query = $this->query;
     

        if ($this->where) {
            $query .= ' WHERE ' . $this->where;
        }

        if ($this->order) {
            $query .= ' ORDER BY ' . implode(', ', $this->order);
        }

        if ($this->limit) {
            $query .= ' LIMIT ' . $this->limit;
        }

        if ($this->offset) {
            $query .= ' OFFSET ' . $this->offset;
        }

        if ($this->group) {
            $query .= ' GROUP BY ' . implode(', ', $this->group);
        }

        if ($this->having) {
            $query .= ' HAVING ' . implode(', ', $this->having);
        }

        if ($this->joins) {
            foreach ($this->joins as $join) {
                $query .= ' ' . $join['type'] . ' JOIN ' . $join['table'] . ' ON ' . $join['on'];
            }
        }

        if ($this->union) {
            $query .= ' UNION ' . $this->union['type'] . ' (SELECT ' . implode(', ', $this->union['columns']) . ' FROM ' . $this->union['where']['table'] . ' WHERE ' . $this->union['where']['column'] . ' ' . $this->union['where']['operator'] . ' :' . $this->union['where']['column'] . ')';
        }

        $stmt = Connection::get()->connect()->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function insert(array $data): QueryBuilder
    {
        $this->query = 'INSERT INTO ' . $this->table . ' (';
        $this->params = [];
        $this->types = [];

        foreach ($data as $column => $value) {
            $this->query .= $column . ', ';
            $this->params[':' . $column] = $value;
            $this->types[':' . $column] = gettype($value);
        }

        $this->query = substr($this->query, 0, -2) . ') VALUES (';

        foreach ($data as $column => $value) {
            $this->query .= ':' . $column . ', ';
        }

        $this->query = substr($this->query, 0, -2) . ')';

        return $this;
    }

    public function update(array $data): QueryBuilder
    {
        $this->query = 'UPDATE ' . $this->table . ' SET ';
        $this->params = [];
        $this->types = [];

        foreach ($data as $column => $value) {
            $this->query .= $column . ' = :' . $column . ', ';
            $this->params[':' . $column] = $value;
            $this->types[':' . $column] = gettype($value);
        }

        $this->query = substr($this->query, 0, -2);

        return $this;
    }

    public function delete(): QueryBuilder
    {
        $this->query = 'DELETE FROM ' . $this->table;

        return $this;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getParams(): array
    {
        return $this->params;

    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function fetchAll(): array
    {
        $stmt = $this->execute();
        return $stmt->fetchAll();
    }

    public function fetch(): array
    {
        $stmt = $this->execute();
        return $stmt->fetch();
    }


    public function __toString()
    {
        return $this->query;
    }

    
}
