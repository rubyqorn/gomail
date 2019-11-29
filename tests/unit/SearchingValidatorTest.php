<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SearchingValidatorTest extends TestCase 
{
    /**
     * Test for check in array was the 'search' key
     * 
     * @return bool
     */ 
    public function testCheckFieldsNamesReturnArrayProperty()
    {
        $reflection = new \ReflectionClass(\Gomail\Searching\Validation\Validator::class);
        $method = $reflection->getMethod('checkFieldNames');
        $method->setAccessible(true);

        $fields = [
            'search', 'title', 'message'
        ];

        $this->assertIsArray($method->invoke(
            new \Gomail\Searching\Validation\Validator(),
            $fields
        ));
    }

    /**
     * Test for the size of the request string was between 2 and 30
     * symbols
     * 
     * @return bool
     */ 
    public function testCheckRequestSizeReturnStringProperty()
    {
        $reflection = new \ReflectionClass(\Gomail\Searching\Validation\Validator::class);
        $method = $reflection->getMethod('checkRequestSize');
        $method->setAccessible(true);

        $searchContent = 'Content';

        $this->assertIsString($method->invoke(
            new \Gomail\Searching\Validation\Validator(),
            $searchContent
        ));
    }
}