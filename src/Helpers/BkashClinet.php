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
        $url = "{$this->baseUrl}/tokenized/checkout/token/grant";
        $header = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'username' => $this->username,
            'password' => $this->password,
        ];

        $body = json_encode([
            'app_key' => $this->apikey,
            'app_secret' => $this->apisecret,
        ]);



        $response = Http::withHeaders($header)->post($url, $body);

        dd($response->json());
    }
}
