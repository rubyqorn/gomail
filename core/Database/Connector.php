<?php

namespace Gomail\Database;

use Gomail\Database\FileHandler\DatabaseSettingsFileHandler;

class Connector
{
    public function __construct()
    {
        $this->getSettings(new DatabaseSettingsFileHandler);
    }

    /**
     * Get database settings
     * 
     * @param \Gomail\Database\FileHandler $settings
     */ 
    private function getSettings(DatabaseSettingsFileHandler $settings)
    {
        return $settings->getDatabaseSettings();
    }
}