<?php

namespace Gomail\Hasher;

class Verifier extends Hasher
{
    /**
     * Verify passed password
     * 
     * @param $password string
     * @param $hash string
     * 
     * @return bool
     */ 
    public function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
}