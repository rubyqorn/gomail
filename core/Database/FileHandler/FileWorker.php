<?php

namespace Gomail\Database\Filehandler;

abstract class FileWorker
{
    /**
     * @var string
     */ 
    protected $filename = null;

    /**
     * Read settings from database settings file
     * 
     * @return resource
     */ 
    protected function readFile($filename)
    {
        $this->filename = $filename;

        if ($this->checkExistsFile($this->filename)) {
            return fopen($this->filename, 'w');
        }
    }

     /**
     * Write values in the database settings file
     * 
     * @return integer
     */ 
    protected function writeContentInFile($filename, $content)
    {
        $this->filename = $filename;

        return fwrite($this->readFile($this->filename), $content);
    }

    /**
     * Close file
     * 
     * @return bool
     * */ 
    protected function closeFile($file)
    {
        $this->filename = $file;

        return fclose($this->filename);
    }

    /**
     * Check for file with database settings was 
     * exists
     * 
     * @param $filename string
     * 
     * @return array
     */ 
    protected function checkExistsFile($filename)
    {
        if (file_exists($filename)) {
            return require $filename;
        }
    }
}