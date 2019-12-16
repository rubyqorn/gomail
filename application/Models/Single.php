<?php

namespace Application\Models;

use Gomail\Database\Model;

class Single extends Model 
{
    /**
     * Contains a table name where
     * will be happen manipulations
     * 
     * @var string
     */ 
    protected $table;

    /**
     * Contains a status of deletion
     * 
     * @var bool
     */ 
    protected $deletion;

    /**
     * Stub method
     * 
     * @return null
     */ 
    public function getAllItems()
    {
        //
    }

    /**
     * Delete single record by ID property
     * 
     * @param $data array
     * @param \Gomail\Database\Model
     * 
     * @return bool
     */ 
    public function transferToTrash($data, Model $model)
    {
        $this->table = $model->table;

        $this->deletion = $this->delete(" message_id = '{$data['id']}' ");

        return $this->deletion;
       
    }
}