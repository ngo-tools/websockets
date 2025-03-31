<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\InteractsWithTime;
use Laravel\Reverb\Servers\Reverb\Console\Commands\RestartServer;

class TriggerReverbRestartController extends Controller
{
    use InteractsWithTime;

    public function __invoke(Request $request)
    {
        if($request->header('token') != config('ngo.api-token')){
            abort(401);
        }

        Cache::forever('laravel:reverb:restart', $this->currentTime());
    }
}
