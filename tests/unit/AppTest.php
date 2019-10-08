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

        $this->assertTrue($app->start());
    }
}