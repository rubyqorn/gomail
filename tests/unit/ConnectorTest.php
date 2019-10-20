<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ConnectorTest extends TestCase
{
    public function testThatTheGetSettingsReturnArray()
    {
        $reflection = new \ReflectionClass(\Gomail\Database\Connector::class);
        $method = $reflection->getMethod('getSettings');
        $method->setAccessible(true);
        $method->invoke(new \Gomail\Database\Connector, ['getSettings']);
        
    }
}