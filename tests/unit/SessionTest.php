<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    /**
     * Test set method of \Gomail\Request\Session
     * 
     * @return bool 
     */ 
    public function testSetMethod()
    {
        $session = new \Gomail\Request\Session('sessionName', 'sessionValue');

        if ($session->set()) {
            return $this->assertTrue(true);
        } 


        $this->assertTrue(false);
    }

    /**
     * Test get method of \Gomail\Request\Session
     * 
     * @return bool 
     */ 
    public function testGetMethod()
    {
        $session = new \Gomail\Request\Session('sessionName', 'sessionValue');

        $this->assertIsObject($session->get());
    }

    /**
     * Test delete method of \Gomail\Request\Session
     * 
     * @return bool 
     */ 
    public function testDeleteMethod()
    {
        $session = new \Gomail\Request\Session('sessionName', 'sessionValue');
        $this->assertEquals($session->delete(), null);
    }
}