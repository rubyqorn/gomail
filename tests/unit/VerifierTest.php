<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class VerifierTest extends TestCase
{
    /**
     * Test verify method which have to return 
     * true if hash and password is equal
     * 
     * @return bool
     */
    public function testVerifyReturnTrueProperty()
    {
        $verify = new \Gomail\Hasher\Verifier();
        return $this->assertIsBool($verify->verify(
                'password', 
                '$2y$10$EDi.hhTDQLXBVUDsUm6Si.yTb7j8Mmgg6xt7wLhLlPFbttqpmHXSm')
            );
    }
}