<?php

namespace Gomail\View;

use Gomail\View\Validator;
use Gomail\Exceptions\RenderingException;

class Renderer
{
    /**
     * @var \Gomail\View\Validator\Validator
     */ 
    private $validator;

    public function __construct()
    {
        $this->validator = new Validator();
    }

    /**
     * Require and pass a data into view
     * 
     * @param $filename string
     * @param $data array
     * 
     * @throws \Gomail\View\Exceptions\RenderingException
     * @return bool 
     */ 
    public function renderer($fileName, $data = [])
    {
        $file = $this->validator->isFile($fileName)->checkFileExists($fileName);

        if ($file) {
            
            if ($data !== null) {
                ob_start();
                extract($data);
                ob_get_clean();
            }

           return require_once $file;
        }

        throw new RenderingException('Rendering exception');
    }
}