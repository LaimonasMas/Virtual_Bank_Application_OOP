<?php
namespace App;
use App\Json;
use App\Account;
use App\Helper;

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
        if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['personalID']) && (preg_match('/^[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s]{3,50}$/', $_POST['name']) === 1) && (preg_match('/^[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s]{3,50}$/', $_POST['surname']) === 1) && Helper::personalLtIdCheck($_POST['personalID'])) {
            $account = new Account;
            $account->amount = (int) ($_POST['count'] ?? 0);
            $account->name = ($_POST['name'] ?? '');
            $account->surname = ($_POST['surname'] ?? '');
            $account->accountNumber = ($_POST['accountNumber'] ?? '');
            $account->personalID = ($_POST['personalID'] ?? '');
            Json::getDB()->store($account); // sukuria
            header('Location: ' . URL . 'created');
            die;
        } else {
            header('Location: ' . URL . 'create');
            die;
        }
    }

    public function list()
    {
        $pageTitle = 'Sąskaitų sąrašas';
        $accounts = Account::sortedAccounts();
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
