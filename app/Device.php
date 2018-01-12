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

//        $client = new Client();


        $auth = session()->get('AUTH');
        //$auth = json_decode($auth);


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://iotdev.dialog.lk/axt-iot-mbil-instance0001001/apkios/axtitomblebckenddev/callActiondev",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                    "operation" => "deviceControl",
                    "deviceId" => $deviceID,
                    "actionName" => $action
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
            return "cURL Error #:" . $err;
        } else {

            //$r = json_encode($response);

            return 'done';
        }
    }
}
