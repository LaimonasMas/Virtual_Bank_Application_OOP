<?php
namespace App;
use App\Json;
use App\Account;

class AccountController
{

    public function login()
    {
        require DIR . 'views/login.php';
    }

    public function index()
    {
        $accounts = Json::getDB()->readData();
        require DIR . 'views/index.php';
    }

    public function create()
    {
        require DIR . 'views/create.php';
    }

    public function created()
    {
        require DIR . 'views/created.php';
    }

    public function store()
    {
        Json::getDB()->store(); // sukuria
    }

    public function list()
    {
        $pageTitle = 'Sąskaitų sąrašas';
        $accounts = Json::getDB()->readData();
        require DIR . 'views/list.php';
    }

    public function add(int $id)
    {
        $accounts = Json::getDB()->readData();
        $account = Json::getDB()->getAccount($id);
        require DIR . 'views/add.php';
    }

    public function addMoney(int $id)
    {
        $account = Json::getDB()->getAccount($id);
        if ($_POST['addEur'] >= 0) {
            $account->amount += (int) ($_POST['addEur'] ?? 0);
        }
        Json::getDB()->addMoney($account); // updeitina
        header('Location: ' . URL . 'list');
        die;
    }

    public function withdraw(int $id)
    {
        $accounts = Json::getDB()->readData();
        $account = Json::getDB()->getAccount($id);
        require DIR . 'views/withdraw.php';
    }

    public function withdrawMoney(int $id)
    {
        $account = Json::getDB()->getAccount($id);
        if ($_POST['withdrawEur'] >= 0 && $_POST['withdrawEur'] <= $account->amount) {
            $account->amount -= (int) ($_POST['withdrawEur'] ?? 0);
        }
        Json::getDB()->withdrawMoney($account); // updeitina
        header('Location: ' . URL . 'list');
        die;
    }

    public function delete(int $id)
    {
        $account = Json::getDB()->getAccount($id);
        if ($account->amount == 0) {
            Json::getDB()->delete($id);
        }
        header('Location: ' . URL . 'list');
        die;
    }
}
