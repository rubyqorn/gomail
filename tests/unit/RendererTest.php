<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase
{
    /**
     * Test that the renderer method return
     * a boolean property
     * 
     * @return bool
     */ 
    public function testRendererReturnBooleanProperty()
    {
        $renderer = new \Gomail\View\Renderer();

        $this->assertIsBool((bool) $renderer->renderer('home', ['title' => 'Title']));
    }
}