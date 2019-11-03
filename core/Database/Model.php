<?php

namespace Gomail\Database;

use Gomail\Database\Query\SQLManipulator;
use Gomail\Hasher\Password;
use Gomail\Hasher\Verifier;

class Model extends SQLManipulator
{
    /**
     * @var \Gomail\Hasher\Password
     */ 
    protected $hasher;

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
}