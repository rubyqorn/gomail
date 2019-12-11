<?php

namespace Application\Controllers\Multiple;

use Application\Controllers\Controller;
use Gomail\Request\Exceptions\InvalidArgumentsException;

class MultipleReplacing extends Controller 
{
    /**
     * Contains an available table names
     * where we can replace records
     * 
     * @var array
     */ 
    protected $tableNames = [
        'messages', 'important', 'checked', 'sent', 'spamed'
    ];

    /**
     * Contains a table name which we get from
     * URI 
     * 
     * @var string
     */ 
    protected $tableName;

    /**
     * Table name validation. And returning the 
     * table name which was correctly validated
     * 
     * @param $uri string
     * 
     * @return string 
     */ 
    public function getTableName($uri)
    {
        if (!$this->checkUriIsString($uri)) {
            throw new InvalidArgumentsException('Wrong data type was passed. String needed');
        }

        $parsedUri = explode('/', $uri);

        if (!$this->validateTableName($parsedUri['0'])) {
            return $this->request->redirect('/');
        }

        return $this->tableName = $this->validateTableName($parsedUri['0']);
    }

    /**
     * Validate for the passed param was a
     * string property
     * 
     * @param $uri string
     * 
     * @return string 
     */ 
    protected function checkUriIsString($uri)
    {
        if (is_string($uri)) {
            return $uri;
        }
    }

    /**
     * Validate table name.The table name have to
     * be in array
     * 
     * @param $table string
     * 
     * @return string
     */
    protected function validateTableName($table)
    {
        if (in_array($table, $this->tableNames)) {
            return $table;
        }
    }
}