<?php  declare(strict_types=1);

namespace Core\QueryBuilder;


/**
 * @author  : Mohammed Bensaad
 * @package : QueryBuilder
 **/

class QueryBuilder
{
    /**
     * @var array<string>
     */
    private $fields = [];

    /**
     * @var array<string>
     */
    private $conditions = [];

    /**
     * @var array<string>
     */
    private $from = [];

    /**
     * @var array<string>
     */
    private $orderBy = [];

    /**
     * @var array<string>
     */
    private $groupBy = [];

    /**
     * @var array<string>
     */
    private $having = [];


    /**
     * @var array<string>
     */
    private $limit = [];

    /**
     * @var array<string>
     */
    private $join = [];

    /**
     * @var array<string>
     */
    private $set = [];

    /**
     * @var array<string>
     */
    private $update = [];


    public function __construct()
    {
        $this->fields = [];
        $this->conditions = [];
        $this->from = [];
        $this->orderBy = [];
        $this->groupBy = [];
        $this->having = [];
        $this->limit = [];
        $this->join = [];
        $this->set = [];
        $this->update = [];
    }

    /**
     * @param string $field
     * @return self
     */
    public function select(string $field): self
    {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * @param string $table
     * @return self
     */
    public function from(string $table): self
    {
        $this->from[] = $table;
        return $this;
    }

    /**
     * @param string $condition
     * @return self
     */
    public function where(string $condition): self
    {
        $this->conditions[] = $condition;
        return $this;
    }

    /**
     * @param string $field
     * @param string $order
     * @return self
     */
    public function orderBy(string $field, string $order): self
    {
        $this->orderBy[] = $field . ' ' . $order;
        return $this;
    }

    /**
     * @param string $field
     * @return self
     */
    public function groupBy(string $field): self
    {
        $this->groupBy[] = $field;
        return $this;
    }

    /**
     * @param string $condition
     * @return self
     */
    public function having(string $condition): self
    {
        $this->having[] = $condition;
        return $this;
    }

    /**
     * @param int $limit
     * @return self
     */
    public function limit(int $limit): self
    {
        $this->limit[] = $limit;
        return $this;
    }

    /**
     * @param string $table
     * @param string $condition
     * @return self
     */
    public function join(string $table, string $condition): self
    {
        $this->join[] = $table . ' ON ' . $condition;
        return $this;
    }


    /**
     * @param string $field
     * @param string $value
     * @return self
     */
    public function update(string $table): self
    {
        $this->update[] = $table;     
        return $this;
    }

    /**
     * @param string $field
     * @param string $value
     * @return self
     */
    public function set(string $field, string $value): self
    {
        $this->set[] = $field . ' = ' . $value;
        return $this;
    }

  
    /**
     * @return string
     */
    public function __toString(): string
    {
       
        $query = 'SELECT ' . implode(', ', $this->fields) . ' FROM ' . implode(', ', $this->from);

        
        if ($this->conditions) {
            $query .= ' WHERE ' . implode(' AND ', $this->conditions);
        }
        
      
        if ($this->groupBy) {
            $query .= ' GROUP BY ' . implode(', ', $this->groupBy);
        }
        if ($this->having) {
            $query .= ' HAVING ' . implode(' AND ', $this->having);
        }
        if ($this->orderBy) {
            $query .= ' ORDER BY ' . implode(', ', $this->orderBy);
        }
        if ($this->limit) {
            $query .= ' LIMIT ' . implode(', ', $this->limit);
        }
        if ($this->join) {
            $query .= ' ' . implode(' ', $this->join);
        }
        if ($this->set) {
            $query .= ' SET ' . implode(', ', $this->set);
        }
        return $query;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->__toString();
    }


   

}