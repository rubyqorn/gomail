<?php

namespace Application\Models;

use Application\Models\Spam;
use Gomail\Database\Model;

class Multiple extends Spam
{
    /**
     * Contains name of table
     * 
     * @var string
     */ 
    public $table;

    /**
     * Contains a records selected from database
     * 
     * @var array
     */ 
    protected $records = [];

    /**
     * Delete all records from table by id from POST
     * array
     *
     * @param $data array
     * @param \Gomail\Database\Model $model
     *  
     * @return null
     */ 
    public function deletion($data, Model $model)
    {   
        $this->table = $model->table;

        foreach($data as $record) {
            $this->unsetQuery();
            $this->delete('message_id = ?', [$record]);
        }
    }

    /**
     * Get records from table for inserting in spam
     * table
     * 
     * @param \Gomail\Database\Model $model 
     * @param $data array
     * 
     * @return array
     */ 
    private function getRecords($data, Model $model = null, $tableName = null)
    {
        if (!isset($tableName)) {
            $this->table = $model->table; 
        } else {
            $this->table = $tableName;
        }
          
        foreach($data as $record) {
            $this->unsetQuery();
            $this->records[] = $this->selectAll()->where(" message_id = '{$record}' ")->getAll();
        }

        return $this->records;
        
    }

    /**
     * Inserting data into spam table. Yes I know 
     * that double loops using is bad :) 
     * 
     * @param $data array
     * @param \Gomail\Database\Model $model 
     * 
     * @return null
     */ 
    public function replaceToSpam($data, Model $model)
    {
        $checking = $this->checkingAvailabilityOfRecords($data);

        if ($checking == TRUE) {

            $items = $this->getRecords($data, $model);
            $this->table = 'spamed';

            foreach($items as $records) {

                $this->unsetQuery();
    
                foreach($records as $record) {
                    $this->insert('message_id, who_sent, whom_sent, title, content', '?,?,?,?,?', [
                        $record['message_id'], $record['who_sent'], $record['whom_sent'],
                        $record['title'], $record['content']
                    ]);
                }
    
           }
        }

        return false;
    }

    /**
     * This methid we need for checking if in the spam
     * table contains a records which we was passed into
     * like argument in this method
     * 
     * @param $data array
     * 
     * @return bool
     */ 
    public function checkingAvailabilityOfRecords($data)
    {
        $records = $this->getRecords($data, null, 'spamed');

        foreach($records as $record) {
            if (!empty($record)) {
                return false;
            }
        }

        return true;

        
    }
}