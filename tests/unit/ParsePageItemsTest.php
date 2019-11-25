<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ParsePageITems extends TestCase
{
    /**
     * Test that the getItems return array
     * 
     * @return bool
     */ 
    public function testGetItemsReturnArray()
    {
        $parser = new \Gomail\Pagination\Parser\ParsePageItems();
        $items = ['item-one', 'item-two', 'item-three'];

        $this->assertIsArray($parser->getItems($items));
    }
    
    /**
     * Test that the countItems return integer property
     * 
     * @return bool
     */
    public function testCountItemsReturnInteger()
    {
        $parser = new \Gomail\Pagination\Parser\ParsePageItems();

        $items = ['item1', 'item2', 'item3'];

        $this->assertIsInt($parser->countItems($items));
    }

    /**
     * Test that the divisionCountedItemsOnItemsPerPage 
     * return integer property
     * 
     * @return bool
     */
    public function testDivisionCountedItemsOnItemsPerPageReturnInteger()
    {
        $parser = new \Gomail\Pagination\Parser\ParsePageItems();
        $items = ['one', 'two', 'three'];

        $this->assertIsInt((int) $parser->divisionCountedItemsOnItemsPerPage($items, 2));
    }
}