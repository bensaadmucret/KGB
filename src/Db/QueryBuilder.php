<?php declare(strict_types=1);

namespace mzb\Db;

class QueryBuilder
{
    private $query;
    private $params;
    private $types;
    private $types_map;
    private $table;
    private $columns;
    private $where;
    private $order;
    private $limit;
    private $offset;
    private $group;
    private $having;
    private $joins;
    private $union;
    private $union_type;
    private $union_columns;
    private $union_where;
    private $union_order;
    private $union_limit;
    
    public function __construct()
    {
        $this->query = '';
        $this->params = [];
        $this->types = [];
        $this->types_map = [
            'string' => '%s',
            'int' => '%d',
            'float' => '%f',
            'bool' => '%d',
            'date' => '%s',
            'datetime' => '%s',
            'time' => '%s',
            'timestamp' => '%s',
            'text' => '%s',
            'blob' => '%s',
            'json' => '%s',
            'array' => '%s',
            'object' => '%s',
            'enum' => '%s',
            'decimal' => '%f',
            'money' => '%f',
            'guid' => '%s',
            'uuid' => '%s',
           

        ];
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
    
    public function where(array $where): QueryBuilder
    {
        $this->where = $where;
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
}
