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

}
