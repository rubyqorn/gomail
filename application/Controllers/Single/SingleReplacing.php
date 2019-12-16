<?php

namespace Application\Controllers\Single;

use Application\Controllers\Controller;
use Application\Models\Single;
use Gomail\Request\Exceptions\InvalidArgumentsException;

abstract class SingleReplacing extends Controller 
{
    /**
     * Contains a table names which will be 
     * using for validation
     * 
     * @var array
     */ 
    protected $tableNames = [
        'messages', 'checked', 'important', 'sent', 'spamed',
    ];

    /**
     * @var \Application\Models\Single
     */ 
    protected $single;

    /**
     * Contains a table name where will
     * be happen manipulations
     * 
     * @var string
     */ 
    protected $table;

    public function __construct()
    {
        parent::__construct();

        $this->single = new Single();
    }

    /**
     * Validate table name and URI
     * 
     * @param $uri string
     * 
     * @return string
     * @throws \Gomail\Request\Exceptions\InvalidArgumentsException 
     */ 
    public function getTableName($uri)
    {
        if (!$this->parseUri($uri)) {
            throw new InvalidArgumentsException('Wrong URI was passed');
        }

        if ($this->validateTableNames($this->table)) {
            return $this->table;
        }
    }

    /**
     * Parse URI for validation
     * 
     * @param $uri string
     * 
     * @return string
     */ 
    protected function parseUri($uri)
    {
        if ($this->checkUriIsString($uri)) {
            $parsedUri = explode('/', $uri);

            return $this->table = $parsedUri['0'];
        }
    }

    /**
     * Check for the passed URI was a string 
     * property
     * 
     * @return string
     * @throws \Gomail\Request\Exceptions\InvalidArgumentsException
     */ 
    protected function checkUriIsString($uri)
    {
        if (is_string($uri)) {
            return $uri;
        }

        throw new InvalidArgumentsException('Wrong data type passed. String needed');
    }

    /**
     * Validate table name. Check for the passed 
     * table name was in the array
     * 
     * @return string
     */ 
    protected function validateTableNames($tableName)
    {
        if (in_array($tableName, $this->tableNames)) {
            return $tableName;
        }
    }
}