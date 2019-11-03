<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TextFieldsValidatorTest extends TestCase
{
    /**
     * Test that the validate method return
     * a boolean property
     * 
     * @return bool
     */ 
    public function testThatTheValidateReturnABooleanProperty()
    {
        $textValidator = new \Gomail\Auth\Validator\TextFieldsValidator();

        $this->assertIsBool($textValidator->validate('anton some'));
    }
}