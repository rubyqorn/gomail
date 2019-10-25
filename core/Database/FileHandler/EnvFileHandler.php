<?php

namespace Gomail\Database\FileHandler;

use Gomail\Hasher\Password;

class EnvFileHandler extends FileWorker
{
    /**
     * @var array
     */ 
    protected $env;
    
    /**
     * @var object
     */ 
    protected $hasher;
    
    /**
     * @var array
     */ 
    protected $settings;

    public function __construct()
    {
        $this->hasher = new Password();
    }

    /**
     * Get database settings from env file
     * 
     * @return array
     */ 
    public function getEnvFile()
    {
        return $this->env = parse_ini_file('env.ini');
    }

    /**
     * Transform password string into hash
     * 
     * @param $password string
     * 
     * @return string
     */ 
    public function hashPassword($password)
    {
        return $this->hasher->hash($password);
    }

    /**
     * Push hashed password string into settings
     * array
     * 
     * @return array
     */ 
    public function pushHashedPasswordIntoSettingsArray()
    {
        $this->settings = $this->getEnvFile();
        $password = $this->settings['DB_PASSWORD'];
        $this->settings['DB_PASSWORD'] = $this->hashPassword($password);
        return $this->settings;
    }
}