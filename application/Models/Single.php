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

    /**
     * Check if we have a record with the same id
     * and return false. And if its not insert 
     * into spam table new record
     * 
     * @param $data array 
     * @param \Gomail\Database\Model $model 
     * 
     * @return bool
     */ 
    public function transferToSpam($data, Model $model) 
    {

        $checking = $this->checkAvailibilityOfRecords('spamed', $data, $model);
        $records = $this->getRecordById($data, $model);

        if ($checking == FALSE) {
            $this->table = 'spamed';
            $this->unsetQuery();

            foreach($records as $record) {
                return $this->insert('message_id, who_sent, whom_sent, title, content', '?,?,?,?,?', [
                    $record['message_id'], $record['who_sent'], $record['whom_sent'], $record['title'],
                    $record['content']
                ]);
            }
        }
        
        return false;
        
    }  

    /**
     * Checking for the passed record was not in
     * the table and insert if this true
     * 
     * @param $uri string
     * @param $data array
     * @param \Gomail\Database\Model $model 
     * 
     * @return bool
     */ 
    public function transferIntoImportants($uri, $data, Model $model)
    {
        $checking = $this->checkAvailibilityOfRecords('important', $data, $model);
        $record = $this->getRecordById($data, $model);

        if ($checking == false) {
            $this->table = 'important';
            $this->unsetQuery();

            foreach($record as $item) {
                return $this->insert('message_id, who_sent, whom_sent, title, content', '?,?,?,?,?', [
                    $item['message_id'], $item['who_sent'], $item['whom_sent'], $item['title'],
                    $item['content']
                ]);
            }
        }
    }

    /**
     * Replace record into checked table
     * 
     * @param $data array
     * @param \Gomail\Database\Model $model 
     * 
     * @return bool
     */ 
    public function transferIntoChecked($data, Model $model) 
    {
        $checking = $this->checkAvailibilityOfRecords('checked', $data, $model);
        $record = $this->getRecordById($data, $model);

        if ($checking == false) {
            $this->table = 'checked';
            $this->unsetQuery();

            foreach($record as $item) {
                return $this->insert('message_id, who_sent, whom_sent, title, content', '?,?,?,?,?', [
                    $item['message_id'], $item['who_sent'], $item['whom_sent'], $item['title'], 
                    $item['content']
                ]); 
            }
        }
    }

    /**
     * Check for in the passed table was records
     * 
     * @param $table string
     * @param \Gomail\Databse\Model $model 
     * 
     * @return bool
     */ 
    public function checkAvailibilityOfRecords(string $table, array $data, Model $model)
    {
        $this->table = $table;

        $records = $this->selectRows('id')->where("id = {$data['id']}")->getOne();
        $this->unsetQuery();

        if ($records == false) {
            return false;
        }

        return $records;

    }

    /**
     * Pass ID property in SQL statement and get
     * a record
     * 
     * @param $data array
     * @param \Gomail\Database\Model $model 
     * 
     * @return array
     */ 
    protected function getRecordById($data, Model $model) 
    {
        $this->table = $model->table;

        return $this->selectAll()->where(" id = {$data['id']} ")->getAll();
    }

}