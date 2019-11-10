<?php

namespace Tests\Unit\Application;

use PHPUnit\Framework\TestCase;

class RememberMeControllerTest extends TestCase
{
    /**
     * Test isClickedButton which have to return true or
     * null property
     * 
     * @return bool
     */ 
    public function testIsClickedButtonReturnBooleanProperty()
    {
        $reflection = new \ReflectionClass(\Application\Controllers\Auth\RememberMeController::class);
        $method = $reflection->getMethod('isClickedButton');
        $method->setAccessible(true);

        $this->assertIsBool($method->invoke(
            new \Application\Controllers\Auth\RememberMeController(),
            'on'
        ));

        $this->assertNull($method->invoke(
            new \Application\Controllers\Auth\RememberMeController(),
            ''
        ));
    }
}