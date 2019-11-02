<?php

namespace Gomail\Database;

use Gomail\Database\FileHandler\DatabaseSettingsFileHandler;
use Gomail\Database\FileHandler\EnvFileHandler;
use Gomail\Hasher\Verifier;
use PDO;

class Connector
{
    /**
     * @var \Gomail\Database\FileHandler\EnvFileHandler
     */ 
    private $env;
    
    /**
     * @var \Gomail\Hasher\Verfier
     */ 
    private $verifier;
    
    /**
     * @var \PDO
     */ 
    protected $connection = null;

    public function __construct()
    {
        $this->env = new EnvFileHandler();
        $this->verifier = new Verifier();

        $this->connect();
    }

    /**
     * Set database settings
     * 
     * @param \Gomail\Database\FileHandler\DatabaseSettingsFileHandler $settings 
     * 
     * @return bool
     */ 
    private function setSettings(DatabaseSettingsFileHandler $settings)
    {
        $config = $this->env->pushHashedPasswordIntoSettingsArray();

        return $settings->setDatabaseSettings(
            $config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']
        );
    }

    /**
     * Get database settings
     * 
     * @param \Gomail\Database\FileHandler $settings
     * 
     * @return array
     */ 
    private function getSettings(DatabaseSettingsFileHandler $settings)
    {
        return $settings->getDatabaseSettings();
    }

    /**
     * Get config file with database settings
     * 
     * @return array
     */ 
    private function getConfigFile(DatabaseSettingsFileHandler $settings)
    {
        if ($this->setSettings($settings)) {
           return $this->getSettings($settings);
        }

    }

    /**
     * Set connection with database using PDO
     * object
     * 
     * @return \PDO
     */ 
    private function connect()
    {
        $config = $this->getConfigFile(new DatabaseSettingsFileHandler());
        
        try {
            $password = $this->env->getEnvFile()['DB_PASSWORD'];
            $hashedPassword = $config['DB_PASSWORD'];

            if ($this->verifier->verify($password, $hashedPassword)) {
                return $this->connection = new PDO(
                    "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", $config['DB_USER'], $password
                );
            }

            return $this->connection;
        } catch(Exception $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}