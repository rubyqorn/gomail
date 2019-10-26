<?php

namespace Gomail\Database\Query;

use Gomail\Database\Connector;

class QueryBuilder extends Connector
{
    protected $query = [];

    /**
     * Get all rows from database
     * 
     * @return array
     */ 
    protected function getAll()
    {
        $statement = $this->connection->query($this->sqlToString());
        return $this->fetchAll($statement);
    }

    /**
     * Get single row from database
     *
     * @return array
     */ 
    protected function getOne()
    {
        $statement = $this->connection->query($this->sqlToString());
        return $this->fetch($statement);
    }

    /**
     * Transform SQL statement in to string value
     * 
     * @return string
     */
    protected function sqlToString()
    {
        return implode(' ', $this->query);
    }

    /**
     * Get associative array with all rows
     * 
     * @param \PDOStatement $statement
     * 
     * @return array
     */ 
    protected function fetchAll(\PDOStatement $statement)
    {
        return $statement->fetchAll();
    }
    
    /**
     * Get associative array with single row
     * 
     * @param \PDOStatement $statement
     * 
     * @return array
     */
    protected function fetch(\PDOStatement $statement)
    {
        return $statement->fetch();
    }

    /**
     * This method we need for updating, deleting
     * and inserting values into database tables
     * This method we need for protecting from SQL
     * injections
     * 
     * @param $statement string
     * @param $bindings array
     * 
     * @return bool
     * */ 
    protected function preparedStatement($statement, $bindings = [])
    {
        $state = $this->connection->prepare($statement);
        return $state->execute($bindings);
    }
}