<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ConnectorTest extends TestCase
{
    public function testThatTheGetSettingsReturnArray()
    {
        $reflectionConnector = new \ReflectionClass(\Gomail\Database\Connector::class);
        $method = $reflectionConnector->getMethod('getSettings');
        $method->setAccessible(true);

        return $this->assertIsArray(
            $method->invoke(new \Gomail\Database\Connector(), 
            new \Gomail\Database\FileHandler\DatabaseSettingsFileHandler)
        );
    }
}