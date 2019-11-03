<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class EmailFieldsValidatorTest extends TestCase
{
    /**
     * Test that the validate method return
     * a boolean property
     * 
     * @return bool
     */ 
    public function testThatTheValidateMethodReturnTrue()
    {
        $emailValidator = new \Gomail\Auth\Validator\EmailFieldsValidator();

        $this->assertIsBool($emailValidator->validate('test@gmail.com'));
    }
}