<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function executeAction($action)
    {


        $deviceID = 2031;
        $token = new Token();

        $token->authorize();

        $auth = session()->get('AUTH');
        $authcr = json_decode($auth);
        dd($authcr);
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/callActiondev",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                    "operation" => "deviceControl",
                    "deviceId" => "{$deviceID}",
                    "actionName" => "{$action}"
                ]
            ),

            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "IotMife-AccessToken: {$token->accessToken}",
                "X-Key: {$authcr->token}",
//                "Postman-Token: d5c4a533-6dd5-4332-5598-9561d000a5f9"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return 404;
        } else {

            return $r = json_encode($response);

            return 200;
        }
    }

    public function executeAction2($code, $frequency=null, $length=null)
    {


        $deviceID = 2187;
        $token = new Token();
        $token->authorize();


//        $client = new Client();


        $auth = session()->get('AUTH');
        $auth = json_decode($auth);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/callActiondev",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                    "operation" => "deviceControl",
                    "deviceId" => "{$deviceID}",
                    "actionName" => 'power',
                    "actionParameters" => [
                        "code" => $code,
                        "mac" => 1902100379354041,
                        "frequency" => 38,
                        "length" => 68
                    ]
                ]
            ),


            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "IotMife-AccessToken: {$token->credentials['accessToken']}",
                "X-Key: {$auth->token}",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {

            //$r = json_encode($response);

            return $response;
        }
    }

    public function getAllDevices()
    {

        $deviceID = 2031;
        $token = new Token();

//        $client = new Client();


        $auth = session()->get('AUTH');
        $auth = json_decode($auth);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/iotadmindev/device",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                    "operation" => "deviceControl",
                    "deviceId" => "{$deviceID}",
                    "actionName" => "power",
                    "actionParameters" => [
                        "power" => [4600, 4350, 700, 1550, 650, 1550, 650, 1600, 650, 450, 650, 450, 650, 450, 650, 450, 700, 400, 700, 1550, 650, 1550, 650, 1600, 650, 450, 650, 450, 650, 450, 700, 450, 650, 450, 650, 450, 650, 1550, 700, 450, 650, 450, 650, 450, 650, 450, 650, 450, 700, 400, 650, 1600, 650, 450, 650, 1550, 650, 1600, 650, 1550, 650, 1550, 700, 1550, 650, 1550, 650],
                    ]
                ]
            ),

            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "IotMife-AccessToken: {$token->credentials['accessToken']}",
                "X-Key: {$auth->token}",
//                "Postman-Token: d5c4a533-6dd5-4332-5598-9561d000a5f9"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return 404;
        } else {

            //$r = json_encode($response);

            return 200;
        }
    }
}
