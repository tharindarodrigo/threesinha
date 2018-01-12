<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    public static function getCredentials()
    {
        $credentials = Credential::all();

        $keyed = $credentials->mapWithKeys(function ($item) {
            return [$item->credential=>$item->value];
        });

        $obj = (object)$keyed;
        return $obj;
    }
}
