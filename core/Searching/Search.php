<?php

namespace Gomail\Searching;

use Gomail\Database\Query\SQLManipulator;
use Gomail\Searching\Validation\Validator;
use Gomail\Request\Request;

class Search extends SQLManipulator
{
    /**
     * @var array
     */ 
    protected $content;

    /**
     * @var string
     */ 
    protected $table;
    
    /**
     * @var array
     */ 
    protected $tableNames = [
        'checked', 'spamed', 'sent', 'important'
    ];

    /**
     * @var \Gomail\Searching\Validation\Validator
     */ 
    protected $validator;

    public function __construct()
    {
        parent::__construct();

        $this->validator = new Validator();
    }

    /**
     * Check for request was POST type
     * 
     * @param \Gomail\Request\Request
     * 
     * @return array
     */ 
    protected function checkRequest(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $request->post();
        }
    }

    /**
     * Set the table name for searching records
     * 
     * @param \Gomail\Request\Request
     * 
     * @return string
     */ 
    public function setTableName(Request $request)
    {
        $parsedString = explode('/', substr($request->getCurrentUri(), 1));

        if (in_array($parsedString['0'], $this->tableNames)) {
            return $this->table = $parsedString['0'];
        }
        
    }

    /**
     * Search records in database table and validate fields
     * 
     * @param \Gomail\Request\Request
     * 
     * @return array 
     */ 
    public function search(Request $request)
    {
        $this->content = $this->checkRequest($request);

        if (!$this->validator->fieldsValidation($this->content)) {
            return $request->session('error', 'Не валидные данные');
        }
        if ($this->setTableName($request)) {
            return $this->selectAll()->where('title')->like(" '%{$this->content['search']}%' ")->getAll();
        }
    }
}