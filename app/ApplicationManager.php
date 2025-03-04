<?php

namespace App;

use App\Services\NgoTools;
use Laravel\Reverb\ConfigApplicationProvider;

class ApplicationManager extends \Laravel\Reverb\ApplicationManager
{
    public function createConfigDriver(): ConfigApplicationProvider
    {
        return new ConfigApplicationProvider(
            collect($this->getApps())
        );
    }

    private function getApps()
    {
        return NgoTools::make()->getWebsocketApps();
    }
}
