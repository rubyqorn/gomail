<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AuthentificateTest extends TestCase
{
    /**
     * Test that the getFields method return
     * an array property
     * 
     * @return bool
     */ 
    public function testGetFieldsReturnArray()
    {
        $mock = \Mockery::mock(\Gomail\Auth\Authentificate::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getFields')->andReturn([
            'name' => 'anton',
            'surname' => 'hideger',
            'email' => 'test@email.com',
            'password' => '123'
        ]);

        $this->assertIsArray($mock->getFields());
    }

    /**
     * Test that the accessValidator method return
     * an object of \Gomail\Auth\Validator\EmailFieldsValidator
     * 
     * @return bool
     */ 
    public function testAccessValidatorReturnAnObjectOfValidatorClasses()
    {
        $mock = \Mockery::mock(\Gomail\Auth\Authentificate::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('accessValidator')->andReturn(
            new \Gomail\Auth\Validator\EmailFieldsValidator()
        );

        $this->assertInstanceOf(\Gomail\Auth\Validator\EmailFieldsValidator::class, 
            $mock->accessValidator('email')
        );
    }

    /**
     * Test that the clearMessages method return
     * a null property
     * 
     * @return bool
     */ 
    public function testClearMessagesReturnNull()
    {
        $mock = \Mockery::mock(\Gomail\Auth\Authentificate::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('clearMessages')->andReturn(null);

        $this->assertNull($mock->clearMessages('error'));
    }
}