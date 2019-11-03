<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AuthValidatorTest extends TestCase
{
    /**
     * Test that the method return an array
     * 
     * @return bool
     */ 
    public function testGetFieldsNamesReturnAnArray()
    {
        $reflection = new \ReflectionClass(\Gomail\Auth\Validator\Validator::class);
        $method = $reflection->getMethod('getFieldsNames');
        $method->setAccessible(true);

        return $this->assertIsArray($method->invoke(new \Gomail\Auth\Validator\Validator(), 
            [
                'name' => 'Anton',
                'surname' => 'Hideger',
                'email' => 'test@email.com',
                'password' => '123'
            ]
        ));

    }
}