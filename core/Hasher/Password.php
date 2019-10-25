<?php

namespace Gomail\Hasher;

class Password extends Hasher
{
    /**
     * Hash passed password
     * 
     * @param $password string
     * 
     * @return string
     * */ 
    public function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}