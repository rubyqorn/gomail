<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ViewValidator extends TestCase
{
    /**
     * Test that the isFile method return
     * a boolean property
     * 
     * @return bool
     */ 
    public function testIsFileReturnBooleanProperty()
    {
        $validator = new \Gomail\View\Validator();

        $this->assertIsBool($validator->isFile('home'));
    }

    /**
     * Test that the checkFileExists method return
     * a string property
     * 
     * @return bool
     */ 
    public function testCheckFileExistsReturnString()
    {
        $validator = new \Gomail\View\Validator();

        $this->assertIsString($validator->checkFileExists('home'));
    }
}