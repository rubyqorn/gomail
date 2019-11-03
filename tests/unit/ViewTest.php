<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    /**
     * Test that the render method return
     * a boolean property
     * 
     * @return bool
     */ 
    public function testRenderReturnBooleanProperty()
    {
        $view = new \Gomail\View\View();
        $title = 'This is a site title';

        $this->assertIsBool((bool) $view->render('home', compact('title')));
    }
}