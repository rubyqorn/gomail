<?php

namespace Gomail;

use Gomail\Routing\Route;

class App
{
    public function start()
    {
    //    return new Route();
        $c = new \Gomail\Database\Connector();
        //$c->getSettings(new \Gomail\Database\DatabaseSettingsFileHandler);
    }
}
