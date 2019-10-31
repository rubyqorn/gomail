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

    public function testSettingsReturnBoolean()
    {
        $reflection = new \ReflectionClass(\Gomail\Database\Connector::class);
        $method = $reflection->getMethod('setSettings');
        $method->setAccessible(true);

        $this->assertIsBool($method->invoke(new \Gomail\Database\Connector(),
            new \Gomail\Database\FileHandler\DatabaseSettingsFileHandler()
        ));
    }

    public function testGetConfigFileReturnArray()
    {
        $reflection = new \ReflectionClass(\Gomail\Database\Connector::class);
        $method = $reflection->getMethod('getConfigFile');
        $method->setAccessible(true);

        $this->assertIsArray($method->invoke(
            new \Gomail\Database\Connector(),
            new \Gomail\Database\FileHandler\DatabaseSettingsFileHandler()
        ));
    }
}