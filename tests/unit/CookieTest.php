<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CookieTest extends TestCase
{
    /**
     * Test delete method of \Gomail\Request\Cookie
     * 
     * @return bool 
     */ 
    public function testDeleteCookieMethod()
    {
        $cookie = new \Gomail\Request\Cookie('name', 'value', time() + (86400 * 30));

        $this->assertEquals($cookie->delete(), null);
    }
}