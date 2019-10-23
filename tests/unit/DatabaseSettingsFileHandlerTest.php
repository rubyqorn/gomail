<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class DatabaseSettingsFileHandlerTest extends TestCase
{
    /**
     * Test createConfigFile which have to return 
     * a array with database constants
     * 
     * @return bool
     * */ 
    public function testCreateConfigFileReturnBoolean()
    {
        $settings = new \Gomail\Database\FileHandler\DatabaseSettingsFileHandler();
        $this->assertTrue($settings->createConfigFile());
    }

    /**
     * Test getDatabaseSettings which have to return an array
     * which contain array with database settings
     * 
     * @return bool
     */ 
    public function testGetDatabaseSettingsMethodReturnArray()
    {
        $settings = new \Gomail\Database\FileHandler\DatabaseSettingsFileHandler();
        $this->assertIsArray($settings->getDatabaseSettings());
    }

    /**
     * Test setDatabaseSettings method where we have to
     * set a database settings
     * 
     * @return bool
     */ 
    public function testSetDatabaseSettingsReturnTrue()
    {
        $settings = new \Gomail\Database\FileHandler\DatabaseSettingsFileHandler();
        $this->assertTrue($settings->setDatabaseSettings('locahost', 'root', 'password', 'DB'));
    }
}