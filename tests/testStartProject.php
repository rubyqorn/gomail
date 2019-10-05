<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class testStartProject extends TestCase
{

    /**
     * Start application 
     * 
     * @return \Gomail\App
     */ 
    public function testStartProjectAnabling()
    {
        $application = new \Gomail\App;
        $start = $application->start();
        return $this->assertTrue($start);
    }
}