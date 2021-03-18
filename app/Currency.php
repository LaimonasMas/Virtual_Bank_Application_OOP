<?php
namespace App;

class Currency {

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

    public static function getRate(String $currency): float
    {
        if (!file_exists(DIR . 'data/rates.json')) { // pirmas kartas
            $rateFromApi = self::getRateFromAPI($currency);
            $rate = json_encode(['rate' => $rateFromApi, 'time' => time()]);
            file_put_contents(DIR . 'data/rates.json', $rate);
        }
        $rates = file_get_contents(DIR . 'data/rates.json');
        $rates = json_decode($rates, 1);
        $timeDiff = time() - $rates['time'];
        if ($timeDiff < 300) {
            return $rates['rate'];
        } elseif ($timeDiff >= 300) {            
            $rateFromApi = self::getRateFromAPI($currency);
            $rate = json_encode(['rate' => $rateFromApi, 'time' => time()]);
            file_put_contents(DIR . 'data/rates.json', $rate);
            return $rateFromApi;
        }
    }

}