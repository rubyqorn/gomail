<?php

namespace Gomail\View;

use Gomail\View\Exceptions\NotAFileException;
use Gomail\View\Exceptions\FileDoesntExistsException;

class Validator
{
    /**
     * @var string
     */ 
    protected const DIR = './views/';

    /**
     * @var string
     */ 
    protected $file = null;

    /**
     * Check if the passed file is file
     * 
     * @param $file string
     * 
     * * @throws \Gomail\View\Exceptions\NotAFileException 
     * @return \Gomail\View\Validator\Validator
     */ 
    public function isFile($file)
    {
        $this->file = self::DIR . $file . '.php';

        if (is_file($this->file)) {
            return $this;
        }

        throw new NotAFileException('Passed file is not a file');
    }

    /**
     * Check if file exists in view direcotory
     * 
     * @param $file string
     * 
     * @throws \Gomail\View\Exceptions\FileDoesntExistsExceptions 
     * @return string
     */ 
    public function checkFileExists($file)
    {
        if (file_exists($this->file)) {
            return $this->file;
        }

        throw new FileDoesntExistsException("File {$file} doesnt exists");
    }
}