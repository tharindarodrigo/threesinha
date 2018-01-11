<?php

namespace App;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class Token
{
    private $credentials;
    private $url;
    private $accessToken;
    private $refreshToken;
    private $expiresIn;


    public function __construct()
    {
        $this->credentials = Credential::all();
        $this->url = 'https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev';

        //dd($this->credentials->where('credential','mifeToken')->first()->value);

        if ($this->tokenExpired()) {
            return $this->authorizeAPI();
        } else {
            $this->accessToken = $this->credentials->access_token;
            $this->refreshToken = $this->credentials->refresh_token;
            $this->expiresIn = $this->credentials->expires_in;
        }

        return Credential::all();
    }

    public function authorizeAPI()
    {
        try {

            $client = new Client();
            $result = $client->post('https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/generate/iotmifetokenviatoken', [
                'headers' => [
//                    'IotMife-Token' => 'Z3l6aXMzVE5ZZlViVzE0ZVFmbjI4YnZXUmZZYTpmQ2p5Z2d3bkE4WGtmUVlVdlJ1blBqTXY0cmdh',
                    'IotMife-Token' => $this->credentials->where('credential', 'mifeToken')->first()->value,
//                    'IotMife-RefreshToken' => 'fa072d20-9e20-339a-bd3b-3a6d4b19428e',
                'IotMife-RefreshToken' => $this->credentials->where('credential','refreshToken')->first()->value,
                    'Content-type' => 'application/json'
                ],

                'verify' => false
            ]);

            $tokens = json_decode($result);

            $this->accessToken = $tokens->access_token;
            $this->refreshToken = $tokens->refresh_token;
            $this->expiresIn = $tokens->expires_in;

            return true;

        } catch (ClientException $e) {
            return $e;
        }

    }


    public function tokenExpired()
    {
        return time() > $this->credentials->where('credential', 'expiry_time')->first()->value;
    }

    public function storeCredentials($data = array())
    {


        foreach ($data as $key => $value){
            Credential::where('credential', $key)->update([$key=>$value]);
        }

        return true;
    }
}
