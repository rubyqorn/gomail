<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    /**
     * Test hash method which have to return 
     * string with hashed password
     * 
     * @return bool
     */ 
    public function testHashReturnStringProperty()
    {
        $password = new \Gomail\Hasher\Password();
        return $this->assertIsString($password->hash('password'));
    }
}