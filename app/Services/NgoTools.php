<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NgoTools
{
    private $client;

    public static function make()
    {
        return new self();
    }

    public function __construct()
    {
        $this->client = Http::withToken(config('services.ngo-tools.websocket-apps-key'))
            ->baseUrl(config('services.ngo-tools.endpoint'))
            ->acceptJson();
    }

    public function getWebsocketApps()
    {
        $response = $this->get('websocket-apps');

        if($response->status() !== 200) {
            throw new \Exception('Unable to get websocket-apps (HTTP status ' . $response->status() . ').');
        }

        return $response->json();
    }

    private function get($endpoint)
    {
        return $this->client
            ->get($endpoint);
    }
}
