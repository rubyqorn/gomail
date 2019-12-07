<?php

namespace Application\Controllers;

use Gomail\Database\Model;

class MultipleTransferInTrashController extends Controller 
{
    /**
     * Contains names of tables 
     * 
     * @var array
     */  
    private $tableNames = [
        'checked', 'messages', 'important', 'sent', 'spamed'
    ];

    /**
     * Parse string with table name
     * 
     * @param $uri string
     * 
     * @return string
     */ 
    private function getTableName(string $uri) :string
    {
        if (isset($uri)) {
            $parsedUri = explode('/', $uri);
            return $parsedUri['0'];
        }
        
    }

    /**
     * Call validation methods and call the method
     * which delete all records
     * 
     * @param $uri string
     * @param \Gomail\Database\Model $model
     * 
     * @return bool
     */ 
    public static function access($uri, Model $model = null)
    {
        $multiple = new self();

        $validation = $multiple->validateTableName($multiple->getTableName($uri));

        if (!$validation) {
            return false;
        }

        if (!$multiple->request->post()) {
            return false;
        }

        if (array_key_exists('trash', $multiple->request->post())) {
            $postData = $multiple->request->post();
            unset($postData['select-all']);
            unset($postData['trash']);
            return $model->deleteMultipleRecords($postData);
        }


    }
    
    /**
     * Validate table name.The table name have to
     * be in array
     * 
     * @param $tableName string
     * 
     * @return string
     */ 
    private function validateTableName($tableName)
    {
        if (in_array($tableName, $this->tableNames)) {
            return $tableName;
        }
    }

}