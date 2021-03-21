<?php
namespace App;

class Helper
{

    public static function personalLtIdCheck($id)
    {
        if (preg_match('/(^[3-6]\d{2}[0-1]\d{1}[0-3]\d{5})$/', $id) === 1) {
            $sum = substr($id, -11, 1) * 1 + substr($id, -10, 1) * 2 + substr($id, -9, 1) * 3 + substr($id, -8, 1) * 4 + substr($id, -7, 1) * 5 + substr($id, -6, 1) * 6 + substr($id, -5, 1) * 7 + substr($id, -4, 1) * 8 + substr($id, -3, 1) * 9 + substr($id, -2, 1) * 1;
            if ($sum % 11 != 10) {
                $lastNumber = $sum % 11;
            } else {
                $sum = substr($id, -11, 1) * 3 + substr($id, -10, 1) * 4 + substr($id, -9, 1) * 5 + substr($id, -8, 1) * 6 + substr($id, -7, 1) * 7 + substr($id, -6, 1) * 8 + substr($id, -5, 1) * 9 + substr($id, -4, 1) * 1 + substr($id, -3, 1) * 2 + substr($id, -2, 1) * 3;
                if ($sum % 11 != 10) {
                    $lastNumber = $sum % 11;
                } else {
                    $lastNumber = 0;
                }
            }
            if (substr($id, -1, 1) == $lastNumber) {
                return true;
            }
        }
        return false;
    }

}
