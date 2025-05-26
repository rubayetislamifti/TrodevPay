<?php

namespace TrodevIT\Trodevpay\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class BkashClinet
{
    protected $apikey;
    protected $baseUrl;
    protected $apisecret;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->apikey = Config::get('bkash.api_key');
        $this->baseUrl = Config::get('bkash.base_url');
        $this->apisecret = Config::get('bkash.api_secret');
        $this->username = Config::get('bkash.username');
        $this->password = Config::get('bkash.password');
    }

    public function getToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'username'=>$this->username,
            'password'=>$this->password,
        ])
            ->post("{$this->baseUrl}/tokenized/checkout/token/grant", [
                'app_key'    => $this->apikey,
                'app_secret' => $this->apisecret,
            ]);


        if ($response->successful()) {
            dd('id_token', $response->json()['id_token']);
            return $response->json()['id_token'];
        }

        throw new \Exception('Failed to retrieve token: ' . $response->body());
    }
}
