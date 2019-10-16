<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ParseControllerTest extends TestCase
{
    /**
     * Test parse method which have return n array with params
     * 
     * @return bool 
     */ 
    public function testParseMethodWhichReturnArrayWithParams()
    {
        $parser = new \Gomail\Routing\Parser\ParseController();
        $controller = 'HomeController@index';
        $this->assertIsArray($parser->parse($controller));
    }
}