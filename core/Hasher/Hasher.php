<?php

namespace Gomail\Hasher;

abstract class Hasher
{
    /**
     * @var string
     */ 
    protected $item;

    /**
     * Set item which have to be hashed
     * 
     * @param $item string
     * 
     * @return string
     */ 
    protected function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * Get item with value
     * 
     * @return string
     */ 
    protected function getItem()
    {
        return $this->item;
    }
}