<?php

namespace Gomail\Database;

use Gomail\Database\Query\SQLManipulator;
use Gomail\Hasher\Password;
use Gomail\Hasher\Verifier;
use Illuminate\Pagination\Paginator;

class Model extends SQLManipulator
{
    /**
     * @var \Gomail\Hasher\Password
     */ 
    protected $hasher;

    /**
     * @var \Illuminate\Pagination\Paginator
     */ 
    protected $paginator;

    /**
     * @var \Gomail\Hasher\Verifier 
     */ 
    protected $verifier;

    public function __construct()
    {
        parent::__construct();

        $this->hasher = new Password();
        $this->verifier = new Verifier();
    }

    /**
     * Create pagination on page
     * 
     * @param $items array
     * @param $perPage int
     */ 
    public function pagination($items, $perPage)
    {
        return $this->paginator = new Paginator($items, $perPage);
    }
}