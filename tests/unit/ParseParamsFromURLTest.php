<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ParseParamsFormURLTest extends TestCase
{
    /**
     * Test that the config file exists and return array with 
     * parameters
     * 
     * @return bool
     */
    public function testConfigFileReturnArrayWithParams()
    {
        $mock = \Mockery::mock(\Gomail\Routing\Parser\ParseParamsFromURL::class)
                        ->shouldAllowMockingProtectedMethods();

        $mock->shouldReceive('configFileHandler')->andReturn([
            '{id}' => '([0-9]+)',
            '{slug}' => '([a-zA-Z_-]+)',
        ]);

        $this->assertSame(
            [
                '{id}' => '([0-9]+)',
                '{slug}' => '([a-zA-Z_-]+)',
            ],
            $mock->configFileHandler('./config/route_params.php')
        );

        $this->assertIsArray($mock->configFileHandler('./config/route_params.php'));
    }

    /**
     * Test parse method which have to return regular expression 
     * pattern like string
     * 
     * @return bool
     */ 
    public function testParseMethodReturnPatternLikeString()
    {
        $mock = $this->createMock(\Gomail\Routing\Parser\ParseParamsFromURL::class);
        $mock->method('parse')->willReturn(['([0-9]+)']);
        $this->assertIsArray($mock->parse(['{id}']));
    }
}