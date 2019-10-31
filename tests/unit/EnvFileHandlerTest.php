<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class EnvFileHandlerTest extends TestCase
{
    /**
     * Test that the getEnvFile return array
     * 
     * @return bool
     */ 
    public function testGetEnvFileReturnArray()
    {
        $env = new \Gomail\Database\FileHandler\EnvFileHandler();

        $this->assertIsArray($env->getEnvFile());
    }

    /**
     * Test that the hashPassword return string
     * 
     * @return bool
     */ 
    public function testHashPasswordReturnString()
    {
        $env = new \Gomail\Database\FileHandler\EnvFileHandler();
        $this->assertIsString($env->hashPassword('password'));
    }

    /**
     * Test that the pushHashedPasswordIntoSettingsArray
     * return array with hashed password
     * 
     * @return bool
     */ 
    public function testPushHashedPasswordIntoSettingsArrayReturnArray()
    {
        $env = new \Gomail\Database\Filehandler\EnvFileHandler();
        $this->assertIsArray($env->pushHashedPasswordIntoSettingsArray());
    }
}