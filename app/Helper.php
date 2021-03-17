<?php
namespace App;

class Helper {

    public static function getRateFromAPI(String $currency): float
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.exchangeratesapi.io/latest');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $answer = curl_exec($curl);
        curl_close($curl);
        $answer = json_decode($answer);
        return $answer->rates->$currency;
    }

}