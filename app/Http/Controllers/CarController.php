<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function control($command)
    {
        $car = new Device();
        return $car->executeAction($command);
    }


}
