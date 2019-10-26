<?php

namespace Gomail\Database\Query;

class SQLManipulator extends QueryBuilder
{
    /**
     * Table name which will be using in model
     * 
     * @var string;
     */ 
    protected $table = 'users';

    /**
     * Select all records from table
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function selectAll()
    {
        $this->query[] = "SELECT * FROM {$this->table}";
        return $this;
    }

    /**
     * Select passed rows like arguments
     * 
     * @param $rows string
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function selectRows($rows) 
    {
        $this->query[] = "SELECT {$rows} FROM {$this->table}";
        return $this;
    }

    /**
     * Insert new record in table
     * 
     * @param $rows string
     * @param $values string
     * @param $bindings array
     * 
     * @return bool
     */
    protected function insert($rows, $values, $bindings = [])
    {
        $this->query[] = "INSERT INTO {$this->table} ({$rows}) VALUES ({$values})";
        return $this->preparedStatement($this->sqlToString(), $bindings);
    }

    /**
     * Update record by passed condition in method
     * 
     * @param $rows string
     * @param $condition string
     * @param $bindings array
     * 
     * @return bool 
     */ 
    protected function update($rows, $condition, $bindings = [])
    {
        $this->query[] = "UPDATE {$this->table} SET {$rows} WHERE {$condition}";
        return $this->preparedStatement($this->sqlToString(), $bindings);
    }

    /**
     * Delete records by condition which was passed 
     * into method
     * 
     * @param $condition string
     * @param $bindings array
     * 
     * @return bool
     */ 
    protected function delete($condition, $bindings = [])
    {
        $this->query[] = "DELETE FROM {$this->table} WHERE {$condition}";
        return $this->preparedStatement($this->sqlToString(), $bindings);
    }

    /**
     * Set condition for SQL statements
     * 
     * @param $condition string
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function where($condition)
    {
        $this->query[] = "WHERE {$condition} ";
        return $this;
    }

    /**
     * It is equivalent of AND in SQL statements
     * 
     * @param $row string
     * @param $condition string
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function and($row, $condition)
    {
        $this->query[] = "AND {$row} {$condition}";
        return $this;
    }

     /**
     * It is equivalent of OR in SQL statements
     * 
     * @param $row string
     * @param $condition string
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */
    protected function or($condition)
    {
        $this->query[] = "OR {$condition}";
        return $this;
    }

    /**
     * This method using for sorting data which we get
     * from table. Second parameter we need for setting
     * ours sorting
     * 
     * @param $row string
     * @param $sorting string
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     * */ 
    protected function orderBy($row, $sorting = null) 
    {
        $this->query[] = "ORDER BY {$row} {$sorting}";
        return $this;
    }

}