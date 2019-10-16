<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RequestURLTest extends TestCase
{
    /**
     * Test parse method which have return n array with params
     * 
     * @return bool 
     */ 
    public function testParseMethodWhichReturnArrayWithParams()
    {
        $parser = new \Gomail\Routing\Parser\ParseURL();
        $url = '/settings/account/edit';
        $this->assertIsArray($parser->parse($url));
    }
}