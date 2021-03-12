<?php

class Json
{

    private static $jsonObj;

    private $data;

    public static function getDB()
    {
        return self::$jsonObj ?? self::$jsonObj = new self;
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
        return $this->data;
    }

    public function writeData(array $data): void
    {
        $this->data = json_encode($data);
    }

    public function getBox(int $id): ?object
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

    // public function update(object $account): void
    // {
    //     foreach ($this->data as $key => $account) {
    //         if ($account->id == $id) {
    //             $this->data[$key] = $account;
    //             return;
    //         }
    //     }
    // }

    public function update(object $updateBox) : void
    {
        foreach($this->data as $key => $box) {
            if ($box->id== $updateBox->id) {
                $this->data[$key] = $updateBox;
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

    public static function accountGenerator()
    {
        $string1 = '';
        for ($i = 0; $i < 2; $i++) {
            $string1 .= rand(0, 9);
        }
        $string2 = '';
        for ($i = 0; $i < 3; $i++) {
            $string2 .= rand(0, 9);
        }
        $string3 = '';
        for ($i = 0; $i < 4; $i++) {
            $string3 .= rand(0, 9);
        }
        $string4 = '';
        for ($i = 0; $i < 4; $i++) {
            $string4 .= rand(0, 9);
        }
        return 'LT' . $string1 . ' ' . '7044 0' . $string2 . ' ' . $string3 . ' ' . $string4;
    }

    public static function accountReadOnly()
    {
        $data = file_get_contents(DIR . 'data/accounts.json');
        $data = json_decode($data, 1);
        foreach($data as $key => $value) {
            $accountNr = $value['accountNumber'];
        }
        return $accountNr;
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