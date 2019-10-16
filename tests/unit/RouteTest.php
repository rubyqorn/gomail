<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    /**
     * Test method which match two routes
     * 
     * @return bool
     */
    public function testThatTheMatchFunctionReturnString()
    {
        $route = new \Gomail\Routing\Route();

        $this->assertIsString($route->match('one', 'one'));

    }

    /**
     * Test method which check if route equal main page
     * then we call method of class
     * 
     * @return bool 
     */ 
    public function testThatTheIsUrlEqualMainPageMethodReturnCallback()
    {        
        $mock = $this->createMock(\Gomail\Routing\Route::class);
        $mock->method('isUrlEqualMainPage')->willReturn(
            call_user_func_array([new \Application\Controllers\HomeController, 'index'], [])
        );
        $this->assertSame(
            call_user_func_array([new \Application\Controllers\HomeController, 'index'], []), 
            $mock->isUrlEqualMainPage('/', 'HomeController@index')
        );
    }

    /**
     * Test protected method which register new route
     * 
     * @return bool
     */
    public function testRegisterRouteReturnCalledCallbackFunction()
    {
        $mock = \Mockery::mock(\Gomail\Routing\Route::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('registerRoute')->andReturn(
            call_user_func_array([new \Application\Controllers\HomeController, 'index'], [])
        );
        
        $this->assertSame(call_user_func_array(
            [new \Application\Controllers\HomeController, 'index'], []), 
            $mock->registerRoute('GET', '/sent', 'HomeController@index'));
        
    }

     /**
     * Test methods which create a routes with http methods
     * 
     * @return bool
     */
    public function testHttpMethodsReturnCalledRegisterRouteMethod()
    {
        $mockery = \Mockery::mock(\Gomail\Routing\Route::class)->shouldAllowMockingProtectedMethods();
        $mockery->shouldReceive('registerRoute')->andReturn(
            call_user_func_array([new \Application\Controllers\HomeController, 'index'], [])
        );

        $methods = [
            'GET', 'POST', 'PUT', 'DELETE'
        ];

        foreach($methods as $method) {
            $mock = $this->createMock(\Gomail\Routing\Route::class);
            $mock->method('getMethod')->willReturn(
                $mockery->registerRoute($method, '/impotant', 'HomeController@index')
            );

            $this->assertSame(
                call_user_func_array([new \Application\Controllers\HomeController, 'index'], []),
                $mock->getMethod('/important', 'HomeController@index')
            );
        }
        
    }
}