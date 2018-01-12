<?php

namespace App;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class Token
{
    public $credentials;
    public $url;
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

            $this->authorizeUser();
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
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/proxy/authenticate",
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                    "user_name" => $this->credentials['user_name'],
                    "password" => $this->credentials['password']]
            ),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "IotMife-AccessToken: {$this->credentials['accessToken']}",
//                "Postman-Token: d5c4a533-6dd5-4332-5598-9561d000a5f9"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {

            $response = json_encode($response);
            $data = json_decode($response);
            //session()->forget('AUTH');
            session()->put('AUTH', $data);

            return $data;
        }
    }

    public function authorizeUser1()
    {
        $client = new Client();

//        dd($this->credentials['accessToken']);
        try {
            $result = $client->request('POST', 'https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/proxy/authenticate', [
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

            //dd('asdasd');


            $data = $result->getResponse()->__toString();

            session()->put('AUTH', $data);

            return true;

        } catch (ClientException $ex) {
//            dd($ex);
            die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
        } catch (GuzzleException $exception) {
            die(sprintf('Http error %s with code %d', $exception->getMessage(), $exception->getCode()));
        }

    }

}
