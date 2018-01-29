<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class IRBlasterController extends Controller
{
    public function sendCommand($command)
    {
        $remote = new Device();

        $commands = [
            'power'=>'4350, 700, 1550, 650, 1550, 650, 1600,650, 450, 650, 450, 650, 450, 650, 450, 700, 400, 700, 1550, 650, 1550, 650, 1600, 650, 450, 650, 450, 650, 450, 700, 450, 650, 450, 650, 450, 650, 1550, 700, 450, 650, 450, 650, 450, 650, 450, 650, 450, 700, 400, 650, 1600, 650, 450, 650, 1550, 650, 1600, 650, 1550, 650, 1550, 700, 1550, 650, 1550, 650',
            'channel1' => '4650,4300,700,1550,700,1550,650,1550,700,400,700,400,700,400,700,450,700,400,700,1500,700,1500,700,1550,700,450,650,400,700,450,650,450,700,400,700,400,700,450,650,1550,700,400,700,400,700,400,700,450,650,450,650,1550,700,1500,700,450,650,1550,700,1550,650,1550,700,1500,700,1550,650',
            'channel2' => '4600,4350,650,1550,700,1500,700,1550,700,400,700,400,700,450,650,450,700,400,700,1500,700,1500,700,1550,700,400,700,450,650,450,700,400,700,400,700,1500,700,400,700,1550,700,400,700,400,700,450,650,450,700,400,700,400,700,1550,650,450,700,1500,700,1550,650,1550,700,1500,700,1550,650',
            'channel3' => '4600,4350,700,1500,700,1550,650,1600,650,400,700,450,700,400,700,400,700,400,700,1550,650,1550,700,1500,700,400,700,450,700,400,700,400,700,400,700,400,700,1550,700,1500,700,450,650,450,700,400,700,400,700,400,700,1550,700,400,700,400,700,1550,650,1550,700,1500,700,1550,700,1500,700',
            'channel4' => '4600,4350,650,1550,700,1500,700,1550,700,400,700,400,700,450,650,450,700,400,700,1500,700,1550,650,1550,700,400,700,450,650,450,700,400,700,400,700,400,700,400,700,450,650,1550,700,400,700,400,700,450,700,400,700,1500,700,1550,650,1550,700,400,700,1550,650,1550,700,1500,700,1550,650',
            'channel5' => '4650,4350,700,1500,700,1550,650,1550,700,400,700,450,700,400,700,400,700,400,700,1500,700,1550,700,1500,700,450,650,450,700,400,700,400,700,400,700,1550,700,400,700,400,650,1550,700,450,650,450,700,400,700,450,650,450,650,1550,650,1550,700,400,700,1550,700,1500,700,1500,700,1550,700',
            'channel6' => '4600,4350,650,1550,700,1500,700,1550,700,400,700,400,700,450,650,450,700,400,700,1500,700,1550,650,1550,700,400,700,450,700,400,700,400,700,400,700,400,700,1550,700,400,700,1500,700,450,650,450,700,400,700,400,700,1550,650,450,650,1550,700,400,700,1550,650,1550,700,1500,700,1550,650',
            'channel7' => '4600,4350,700,1500,700,1550,650,1550,700,400,700,450,700,400,700,400,700,400,700,1550,650,1550,700,1500,700,400,700,450,700,400,700,400,700,400,700,450,650,450,650,1550,700,1500,700,450,700,400,700,400,700,450,650,1550,650,1550,700,450,650,400,700,1550,700,1500,700,1550,650,1550,700',
            'channel8' => '4600,4350,650,1600,650,1500,700,1550,700,400,700,400,700,400,700,450,700,400,700,1500,700,1550,650,1550,700,400,700,450,650,450,700,400,700,400,700,1550,650,450,650,1550,700,1500,700,450,700,400,700,400,700,400,700,400,700,1550,700,400,700,450,650,1550,650,1550,700,1500,700,1550,650',
            'channel9' => '4600,4350,700,1500,700,1550,650,1550,700,400,700,450,650,450,650,450,700,400,700,1500,700,1550,700,1550,650,400,700,450,700,400,700,400,700,400,700,450,650,1550,650,1600,650,1550,650,450,700,400,700,400,700,400,700,1550,700,400,700,400,700,400,700,1550,700,1500,700,1500,700,1550,700',
            'channel0' => '4650,4300,700,1550,700,1500,700,1550,700,400,700,400,700,400,700,450,650,450,650,1550,700,1550,650,1550,700,400,700,400,700,400,700,450,700,400,700,1550,650,400,700,450,700,400,650,1550,700,400,700,450,700,400,700,400,700,1500,700,1550,700,1500,700,400,700,1550,650,1550,700,1500,700',
            'source'=>'4600,4350,700,1550,650,1550,700,1500,700,450,650,450,700,400,700,400,700,400,700,1550,700,1500,700,1550,700,400,700,400,700,400,700,400,700,400,700,1550,700,400,700,450,650,450,650,450,700,400,700,400,700,400,700,450,650,1550,700,1500,700,1550,650,1550,700,1500,700,1550,700,1500,700',
            'channelup' => '4600,4350,700,1500,700,1500,700,1550,700,450,650,400,700,450,650,450,700,400,700,1500,700,1550,650,1550,700,450,650,450,700,400,700,400,700,400,700,400,700,1550,700,400,700,400,700,1550,650,450,700,400,700,400,700,1550,650,450,650,1600,650,1550,650,450,700,1500,700,1500,700,1550,650',
            'channeldown' => '4650,4300,700,1550,700,1500,700,1550,700,400,700,400,700,400,700,450,650,450,650,1550,700,1500,700,1550,700,400,700,400,700,400,700,450,700,400,700,400,700,400,700,450,650,450,650,1550,700,400,700,450,650,400,700,1550,700,1500,700,1550,700,1500,700,400,700,1550,650,1550,700,1500,700',
            'volumeup'=>'4600,4350,650,1550,700,1500,700,1550,700,400,700,400,700,450,650,450,700,400,700,1500,700,1550,650,1550,700,400,700,400,700,450,650,450,700,400,700,1500,700,1550,650,1550,700,400,700,450,700,400,700,400,700,400,700,450,650,450,650,450,650,1550,700,1500,700,1550,700,1500,700,1550,650',
            'volumedown'=>'4600,4350,700,1550,650,1550,700,1500,700,450,650,450,700,400,700,400,700,400,700,1550,700,1500,700,1550,700,400,700,400,700,400,700,450,650,450,650,1550,700,1500,700,450,650,1550,700,400,700,400,700,450,700,400,700,400,700,400,700,1550,700,400,700,1500,700,1500,700,1550,700,1500,700',
            'mute'=>'4650,4350,650,1550,650,1550,700,1550,700,400,700,400,700,400,700,450,650,450,650,1550,700,1500,700,1550,700,400,700,450,650,400,700,450,700,400,700,1500,700,1550,650,1550,700,1500,700,450,700,400,700,400,700,400,700,400,700,450,650,450,700,400,700,1500,700,1550,650,1550,700,1500,700'

        ];

        return $remote->executeAction2($commands[$command]);

    }
}
