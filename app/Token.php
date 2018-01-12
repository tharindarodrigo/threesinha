<?php

namespace App;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class Token
{
    public $credentials;
    private $url;
    public $accessToken;
    public $refreshToken;
    public $expiresIn;


    public function __construct()
    {
//        return Credential::all();

        $this->credentials = Credential::getCredentials();
        $this->url = 'https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev';


//        var_dump($this->credentials);
        //dd($this->credentials->where('credential','mifeToken')->first()->value);

        if ($this->tokenExpired()) {
            $this->authorizeAPI();

        } else {
            $this->accessToken = $this->credentials['accessToken'];
            $this->refreshToken = $this->credentials['refreshToken'];
            $this->expiresIn = $this->credentials['expiry_time'];


        }


    }

    public function authorizeAPI()
    {

//        /dd($this->credentials, $this->credentials['mifeToken'], $this->credentials['refreshToken']);

        try {

            $client = new Client();
            $result = $client->request('POST', 'https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/generate/iotmifetokenviatoken', [
                'headers' => [
                    'IotMife-Token' => $this->credentials['mifeToken'],
                    'IotMife-RefreshToken' => $this->credentials['refreshToken'],
                    'Content-type' => 'application/json',
                    'Accept' => 'application/json',
                ],

                'verify' => false
            ]);

//            $result->getBody();


            $r = $result->getBody()->__toString();
            $data = json_decode($r);

            $accessToken = $data->access_token;
            $refreshToken = $data->refresh_token;
            $expiresIn = $data->expires_in;


            $this->storeCredentials([
                ['credential' => 'accessToken', 'value' => $accessToken],
                ['credential' => 'refreshToken', 'value' => $refreshToken],
                ['credential' => 'expiry_time', 'value' => $expiresIn + time()],
            ]);

            $this->authorizeUser();

            return true;


        } catch (ClientException $e) {
            return $e;
        }

    }

    /**
     * @return bool
     */
    public function tokenExpired()
    {
        return time() > $this->credentials['expiry_time'];
    }

    /**
     * @param $data
     * @return bool
     */
    public function storeCredentials($data)
    {
        foreach ($data as $info) {
            Credential::where('credential', $info['credential'])->update(['value' => $info['value']]);
        }

        return true;
    }

    public function authorizeUser()
    {
        $client = new Client();

        //dd($this->credentials['refreshToken']);
        try {
            $result = $client->request('POST', $this->url . '/proxy/authenticate', [
                'headers' => [
//                'IotMife-Token' => $this->credentials['mifeToken'],
                    'IotMife-AccessToken' => $this->credentials['accessToken'],
                    'Content-type' => 'application/json',
                    //'Accept' => 'application/json',
                ],
                'form_params' => [
                    'user_name' => $this->credentials['user_name'],
                    'password' => $this->credentials['password']
                ],

                'verify' => false
            ]);

            dd('asdasd');


            return $data = $result->getResponse()->__toString();

            session()->put('AUTH', $data);

            return true;

        } catch (ClientException $ex) {
            die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
        } catch (GuzzleException $exception) {
            die(sprintf('Http error %s with code %d', $exception->getMessage(), $exception->getCode()));
        }

    }

}
