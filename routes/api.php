<?php

use App\Http\Controllers\Api\TriggerReverbRestartController;
use Illuminate\Support\Facades\Route;

Route::post('trigger-restart', TriggerReverbRestartController::class);
