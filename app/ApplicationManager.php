<?php

namespace App;

use App\Services\NgoTools;
use Laravel\Reverb\ConfigApplicationProvider;

class ApplicationManager extends \Laravel\Reverb\ApplicationManager
{
    public function createConfigDriver(): ConfigApplicationProvider
    {
        $apps = $this->getApps();

        info('Starting websocket for the following apps: ' . $apps->pluck('app_id')->implode(', '));

        return new ConfigApplicationProvider($apps);
    }

    private function getApps()
    {
        return collect(NgoTools::make()->getWebsocketApps());
    }
}
