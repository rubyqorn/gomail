<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RouteParserTest extends TestCase
{
    /**
     * Test arrayToString method which convert array to string
     * 
     * @return bool 
     */ 
    public function testArrayToStringConvertationMethodReturnString()
    {
        $mock = \Mockery::mock(\Gomail\Routing\Parser\RouteParser::class);
        $mock->shouldReceive('arrayToString')->andReturn('settings/account/edit');
        $arr = [
            'settings', 'account', 'edit'
        ];
        $this->assertIsString($mock->arrayToString($arr));
    }
}