<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    /**
     * Test start method of app class
     * 
     * @return bool 
     */ 
    public function testStartProject()
    {
        $app = new \Gomail\App();

        $this->assertInstanceOf(\Gomail\Routing\Route::class, $app->start());
    }

    /**
     * Test runDatabase method which have to return connector
     * object
     * 
     * @return bool 
     */ 
    public function testRunDatabaseReturnConnectorObject()
    {
        $app = new \Gomail\App();

        $this->assertInstanceOf(\Gomail\Database\Connector::class, $app->runDatabase());
    }
}