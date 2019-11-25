<?php

namespace Gomail\Pagination\Parser;

use Gomail\Request\Request;

class ParsePageItems extends Request
{

    /**
     * Check for items was an array property
     * 
     * @param $items array
     * 
     * @return array
     */ 
    public function getItems(array $items) : array
    {
        if (is_array($items)) {
            return $items;
        }

        die('You have to pass an array');
    }

    /**
     * Create a <li> HTML item which contain a link
     * and number of page
     * 
     * @param $items array
     * @param $perPage int
     * 
     * @return string
     */ 
    public function setListItems($items, $perPage)
    {
        $numberOfItems = $this->divisionCountedItemsOnItemsPerPage($items, $perPage);
        $page = $this->getPageNumber();

        for($i = $page * $numberOfItems; $i <= ($page + 1) * $numberOfItems; $i++) {
            echo "<li class='page-item'>
                    <a class='page-link' href='{$i}'>
                        {$i}
                    </a>
                </li>";
        }
    }

    /**
     * Count items in array
     * 
     * @param $items array
     * 
     * @return int
     */ 
    public function countItems($items)
    {
        return count($items);
    }

    /**
     * Division counted items on per page number
     * and floor final result
     * 
     * @param $items array
     * @param $perPage int
     * 
     * @return int
     */ 
    public function divisionCountedItemsOnItemsPerPage($items, $perPage)
    {
        return floor($this->countItems($items) / $perPage);
    }
}