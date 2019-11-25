<?php

namespace Gomail\Pagination;

use Gomail\Pagination\Parser\ParsePageItems;

class Pagination extends ParsePageItems
{ 
    /**
     * Call method which have to return a list
     * items
     * 
     * @param $items array
     * @param $perPage int
     * 
     * @return string
     */ 
    public function visualize($items, $perPage)
    {
        if ($this->parser()->checkPageAvalibility()) {
            return $this->parser()->setListItems($items, $perPage);
        }
    }

    /**
     * Access a Parser object
     * 
     * @return \Gomail\Pagination\Parser\ParseItems
     */ 
    public function parser()
    {
        return new \Gomail\Pagination\Parser\ParsePageItems();
    }
}