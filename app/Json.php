<?php
namespace App;
use App\Account;
use App\Helper;

class Json
{

    private static $jsonObj;

    private $data;

    public static function getDB()
    {
        return self::$jsonObj ?? self::$jsonObj = new self; // sukuria tik viena objekta
    }

    private function __construct()
    {
        if (!file_exists(DIR . 'data/accounts.json')) { // pirmas kartas
            $data = json_encode([]);
            file_put_contents(DIR . 'data/accounts.json', $data);
        }
        $data = file_get_contents(DIR . 'data/accounts.json');
        $this->data = json_decode($data);
    }

    public function __destruct()
    {
        file_put_contents(DIR . 'data/accounts.json', json_encode($this->data));
    }

    public function readData(): array
    {
        usort($this->data, function ($a, $b) {
            return $a->surname <=> $b->surname;
        });
        return $this->data;
    }

    public function writeData(array $data): void
    {
        $this->data = json_encode($data);
    }

    public function getAccount(int $id): ?object
    {
        foreach ($this->data as $account) {
            if ($account->id == $id) {
                return $account;
            }
        }
        return null;
    }

    public function store(Account $account): void
    {
        $id = $this->getNextId();
        $account->id = $id;
        $this->data[] = $account;
    }

    public function addMoney(object $updateAccount): void
    {
        foreach ($this->data as $key => $box) {
            if ($box->id == $updateAccount->id) {
                $this->data[$key] = $updateAccount;
                return;
            }
        }
    }

    public function withdrawMoney(object $updateAccount): void
    {
        foreach ($this->data as $key => $box) {
            if ($box->id == $updateAccount->id) {
                $this->data[$key] = $updateAccount;
                return;
            }
        }
    }

    public function delete(int $id): void
    {
        foreach ($this->data as $key => $account) {
            if ($account->id == $id) {
                unset($this->data[$key]);
                $this->data = array_values($this->data);
                return;
            }
        }
    }

    private function getNextId(): int
    {
        if (!file_exists(DIR . 'data/indexes.json')) { // pirmas kartas
            $index = json_encode(['id' => 1]);
            file_put_contents(DIR . 'data/indexes.json', $index);
        }
        $index = file_get_contents(DIR . 'data/indexes.json');
        $index = json_decode($index, 1);
        $id = (int) $index['id'];
        $index['id'] = $id + 1;
        $index = json_encode($index);
        file_put_contents(DIR . 'data/indexes.json', $index);
        return $id;
    }

    public static function getRate(String $currency): float
    {
        if (!file_exists(DIR . 'data/rates.json')) { // pirmas kartas
            $rateFromApi = Helper::getRateFromAPI($currency);
            $rate = json_encode(['rate' => $rateFromApi, 'time' => time()]);
            file_put_contents(DIR . 'data/rates.json', $rate);
        }
        $rates = file_get_contents(DIR . 'data/rates.json');
        $rates = json_decode($rates, 1);
        $timeDiff = time() - $rates['time'];
        if ($timeDiff < 300) {
            return $rates['rate'];
        } elseif ($timeDiff >= 300) {            
            $rateFromApi = Helper::getRateFromAPI($currency);
            $rate = json_encode(['rate' => $rateFromApi, 'time' => time()]);
            file_put_contents(DIR . 'data/rates.json', $rate);
            return $rateFromApi;
        }
    }

    public static function accountReadOnly()
    {
        $data = file_get_contents(DIR . 'data/accounts.json');
        $data = json_decode($data, 1);
        usort($data, function ($a, $b) {
            return $a['id'] <=> $b['id'];
        });
        $lastAccount = $data[count($data) - 1];
        $accountNr = $lastAccount['accountNumber'];
        $name = $lastAccount['name'];
        $surname = $lastAccount['surname'];  
        _d($data);   
        return "Naują sąskaitą sukūrė $name $surname, sąskaitos numeris: $accountNr";
    }
}


/*
[
    ['id'=>1, 'bannana'=> 0],
    ['id'=>2, 'bannana'=> 10],
    ['id'=>3, 'bannana'=> 600],
    ['id'=>4, 'bannana'=> 10],
    
]
'index.php' ----> __DIR__ c:/x/box/ <----- atskaitos taskas define DIR
'../index.php' ----> __DIR__ c:/x/box/app
'../../index.php' ----> __DIR__ c:/x/box/app/dargiliau
__DIR__+'index.php'
*/