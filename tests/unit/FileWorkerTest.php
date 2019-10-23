<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FileWorkerTest extends TestCase
{
    /**
     * Test the readFile method which have to return a
     * resource property
     * 
     * @return bool 
     */ 
    public function testReadFileReturnResourceProperty()
    {
        $mock = \Mockery::mock(\Gomail\Database\FileHandler\FileWorker::class)
                        ->shouldAllowMockingProtectedMethods();
        $file = fopen('./config/database.php', 'r');
        $mock->shouldReceive('readFile')->andReturn($file);

        $this->assertSame($file, $mock->readFile('./config/database.php'));
        $this->assertIsResource($mock->readFile('./config/database.php'));
    }

    /**
     * Test the closeFile method which have to return a
     * boolean property
     * 
     * @return bool 
     */ 
    public function testCloseFileReturnBooleanProperty()
    {
        $mock = \Mockery::mock(\Gomail\Database\FileHandler\FileWorker::class)
                        ->shouldAllowMockingProtectedMethods();

        $mock->shouldReceive('closeFile')->andReturn(true);
        $this->assertTrue($mock->closeFile('./config/database.php'));
    }
}