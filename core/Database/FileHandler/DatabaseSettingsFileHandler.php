<?php

namespace Gomail\Database\FileHandler;

class DatabaseSettingsFileHandler extends FileWorker
{
    /**
     * Read the database file from conifg folder
     * and generate constants for database connection
     * and finaly close the readed file
     * 
     * @return bool
     */ 
    public function createConfigFile()
    {
        $readedFile = $this->readFile('./config/database.php');

        if($readedFile) {
            $databaseValues = $this->writeContentInFile('./config/database.php', "<?php
            return [
                        'DB_HOST' => '',
                        'DB_USER' => '',
                        'DB_PASSWORD' => '',
                        'DB_NAME' => '',
                        'DB_PORT' => '3306'
                    ];"
            );

            if ($databaseValues) {
                return $this->closeFile($readedFile);
            }
            
        }
    }

    /**
     * Get settings from database config file
     * which was setted with setDatabaseSettings
     * method
     * 
     * @return array
     */ 
    public function getDatabaseSettings()
    {
        $this->filename = $this->checkExistsFile('./config/database.php');
        
        if ($this->filename) {
           return $this->filename;
        }
    }

    /**
     * Set database settings
     * 
     * @param $host string
     * @param $user string
     * @param $password string
     * @param $dbName string
     * 
     * @return bool
     */ 
    public function setDatabaseSettings($host, $user, $password, $dbName)
    {
        $this->filename = './config/database.php';

        if($this->checkExistsFile($this->filename)) {
            require_once $this->filename;

            $settings = '<?php
            return [
                    "DB_HOST" => "'."{$host}".'",
                    "DB_USER" => "'."{$user}".'",
                    "DB_PASSWORD" => "'. "{$password}". '",
                    "DB_NAME" => "' ."{$dbName}". '",
                ];';


            $readedFile = $this->readFile($this->filename);
            $this->writeContentInFile($this->filename, $settings);
            return $this->closeFile($readedFile);

        }
    }

}