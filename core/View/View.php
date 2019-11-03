<?php

namespace Gomail\View;

use Gomail\View\Renderer;

class View extends Renderer
{
    /**
     * Render a view and pass the data
     * 
     * @param $fileName string
     * @param $data array
     * 
     * @return bool
     */ 
    public function render($fileName, $data = [])
    {
        return $this->renderer($fileName, $data);
    }
}