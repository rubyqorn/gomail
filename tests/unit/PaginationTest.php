<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PaginationTest extends TestCase 
{
    /**
     * Test that the parser method return an object
     * of ParsePageItems
     * 
     * @return bool
     */ 
    public function testParserReturnAnObject()
    {
        $pagination = new \Gomail\Pagination\Pagination();

        $this->assertIsObject($pagination->parser());
        $this->assertInstanceOf(\Gomail\Pagination\Parser\ParsePageItems::class, $pagination->parser());
    }
}