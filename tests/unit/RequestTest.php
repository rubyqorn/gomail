<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * Test cookie method of request class
     * 
     * @return bool 
     */ 
    public function testCookieMethod()
    {
        $request = new \Gomail\Request\Request();
        $obj = $request->cookie('name', 'value', time() + (86400 * 30));

        $this->assertIsObject($obj);
    }

    /**
     * Test session method of request class
     * 
     * @return bool 
     */
    public function testSessionMethod()
    {
        $request = new \Gomail\Request\Request();
        $obj = $request->session('name', 'value');

        $this->assertIsObject($obj);
    }

    /**
     * Test get method of request class
     * 
     * @return bool 
     */
    public function testGetMethod()
    {
        $request = new \Gomail\Request\Request();
        $getMethod = $request->get('params');

        $this->assertIsArray($getMethod);
    }

    /**
     * Test post method of request class
     * 
     * @return bool 
     */
    public function testPostMethod()
    {
        $request = new \Gomail\Request\Request();
        $postMethod = $request->post();

        $this->assertIsArray($postMethod);
    }
}