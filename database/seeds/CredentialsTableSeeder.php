<?php

use Illuminate\Database\Seeder;

class CredentialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Credential::insert([
            ['credential' => 'refreshToken', 'value' => '2b172817-8c8f-3e9b-9722-ba46b1645cab'],
            ['credential' => 'accessToken', 'value' => '3f16a0df-8073-3cd8-adef-1ffe740646a9'],
            ['credential' => 'expiry_time', 'value' => 0],
            ['credential' => 'user_name', 'value' => 'dialogiotdeveloper@gmail.com'],
            ['credential' => 'password', 'value' => 'ideamart'],
//            ['credential' => 'mifeToken', 'value' => 'Z3l6aXMzVE5ZZlViVzE0ZVFmbjI4YnZXUmZZYTpmQ2p5Z2d3bkE4WGtmUVlVdlJ1blBqTXY0cmdh']
            ['credential' => 'mifeToken', 'value' => 'aFQzWVg5Y0ZrOHFHNEhTelNkUk9vRFBfMDdVYTpTMmN4MFBIQTFXMUJXcXFObDhhSDJKQkNvRk1h']
        ]);
    }

}
