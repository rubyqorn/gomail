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
     * This is equivalent of LIKE in SQL statements
     * 
     * @param $condition string
     * 
     * @return \Gomail\Database\Query\SQLManipulator 
     */ 
    protected function like($condition)
    {
        $this->query[] = "LIKE {$condition}";
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

    /**
     * This is equivalent of LIMIT SQL statement
     * 
     * @param $condition string
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function limit($condition)
    {
        $this->query[] = "LIMIT {$condition}";
        return $this;
    }

    /**
     * This is equivalent of INNER JOIN in SQL
     * statement
     * 
     * @param string $wantedTable 
     * @param string $condition
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function join($wantedTable, $condition)
    {
        $this->query[] = "INNER JOIN {$wantedTable} ON $condition";
        return $this;
    }

    /**
     * This is equivalent of LEFT JOIN in SQL statements
     * 
     * @param string $wantedTable
     * @param string $condition
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function leftJoin($wantedTable, $condition)
    {
        $this->query[] = "LEFT JOIN {$wantedTable} ON {$condition}";
        return $this;
    }

     /**
     * This is equivalent of RIGHT JOIN in SQL statements
     * 
     * @param string $wantedTable
     * @param string $condition
     * 
     * @return \Gomail\Database\Query\SQLManipulator
     */ 
    protected function rightJoin($wantedTable, $condition)
    {
        $this->query[] = "RIGHT JOIN {$wantedTable} ON {$condition}";
        return $this;
    }

    /**
     * Delete SQL query. Can be used when one first 
     * SQL conflict with second SQL
     * 
     * @return null
     */ 
    protected function unsetQuery()
    {
        unset($this->query);
    }

}