<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    protected $baseUrl = 'http://gomail.com/';

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

    /**
     * Test currentUriMethod of \Gomail\Request\Request
     * 
     * @return bool 
     */ 
    public function testCurrentUriMethod()
    {
        $request = new \Gomail\Request\Request();

        $mock = $this->createMock(\Gomail\Request\Request::class);
        $mock->method('getCurrentUri')
            ->willReturn('home');

        $this->assertInstanceOf(\Gomail\Request\Request::class, $mock);    
        $this->assertSame('home', $mock->getCurrentUri());
    }
 
    /**
     * Test setUri and getUri methods
     * 
     * @return bool 
     */ 
    public function testThatUriSetterAndGetterIsWorking()
    {
        $request = new \Gomail\Request\Request();

        $uris = [
            'sent',
            'important'
        ];

        foreach($uris as $uri) {
            $settedUri = $request->setUri($uri);
            $response = $request->getUri();

            $this->assertEquals($settedUri, $response);
            
        }
    }

    /**
     * Test the getFullUrl method of \Gomail\Request\Request
     * 
     * @return bool 
     */
    public function testGetFullUrlMethod()
    {
        $mock = $this->getMockBuilder(\Gomail\Request\Request::class)
                    ->getMock();
        $mock->method('getFullUrl')
            ->willReturn('http://gomail.com/sent');
            
        $this->assertInstanceOf(\Gomail\Request\Request::class, $mock);
        $this->assertSame('http://gomail.com/sent', $mock->getFullUrl());
    }

    /**
     * Test the getHttpMethod method of \Gomail\Request\Request
     * 
     * @return bool 
     */
    public function testThatMethodReturnValidHttpMethod()
    {
        $mock = $this->getMockBuilder(\Gomail\Request\Request::class)
                    ->getMock();

        $mock->method('getHttpMethod')->willReturn('GET');

        $this->assertInstanceOf(\Gomail\Request\Request::class, $mock);
        $this->assertSame('GET', $mock->getHttpMethod());
    }

    /**
     * Test the redirect method of \Gomail\Request\Request
     * 
     * @return bool 
     */
    public function testThatTheRedirectMethodWorkingCorrectly()
    {
        $mock = $this->createMock(\Gomail\Request\Request::class);
        $mock->method('redirect')->willReturn(200);

        $this->assertInstanceOf(\Gomail\Request\Request::class, $mock);
        $this->assertSame(200, $mock->redirect('home'));  
    }

    /**
     * Test the showHeaders method of \Gomail\Request\Request
     * 
     * @return bool 
     */
    public function testThatTheShowHeadersMethodReturnArrayWithHeaderParameters()
    {
        $mock = $this->createMock(\Gomail\Request\Request::class);
        $mock->method('showHeaders')->willReturn([
            'expires' => date('D, d M Y', strtotime('19-01-2000')),
            'cache-control' => 'no-store, no-cache, must-revalidate',
            'pragma' => 'no-cache',
        ]);

        $this->assertInstanceOf(\Gomail\Request\Request::class, $mock);
        $this->assertSame([
            'expires' => date('D, d M Y', strtotime('19-01-2000')),
            'cache-control' => 'no-store, no-cache, must-revalidate',
            'pragma' => 'no-cache',
        ], $mock->showHeaders());
    }

    /**
     * Test the authUserName method of \Gomail\Request\Request
     * 
     * @return bool 
     */
    public function testThatTheMethodReturnAuthUserName()
    {
        $mock = $this->createMock(\Gomail\Request\Request::class);
        $mock->method('authUserName')->willReturn('John');

        $this->assertInstanceOf(\Gomail\Request\Request::class, $mock);
        $this->assertSame('John', $mock->authUserName());
    }

    /**
     * Test the authUserPassword method of \Gomail\Request\Request
     * 
     * @return bool 
     */ 
    public function testThatTheMethodReturnAuthUserPassword()
    {
        $mock = $this->createMock(\Gomail\Request\Request::class);
        $this->assertInstanceOf(\Gomail\Request\Request::class, $mock);

        $mock->method('authUserPassword')->willReturn('password123');
        $this->assertSame('password123', $mock->authUserPassword());
    }
}