<?php

class AccountController
{

    public function index()
    {
        $pageTitle = 'Laimono Bankas';
        $accounts = Json::getDB()->readData();
        require DIR . 'views/index.php';
    }

    public function create()
    {
        $pageTitle = 'New Bananna Box';

        require DIR . 'views/create.php';
    }

    public function created()
    {
        $pageTitle = 'New Bananna Box';

        require DIR . 'views/created.php';
    }

    public function store()
    {
        if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['personalID']) && (preg_match('/^[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s]{3,50}$/', $_POST['name']) === 1) && (preg_match('/^[a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s]{3,50}$/', $_POST['surname']) === 1) && (preg_match('/(^[3-6]\d{2}[0-1]\d{1}[0-3]\d{5})$/', $_POST['personalID']) === 1)) {
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
        $accounts = Json::getDB()->readData();
        require DIR . 'views/list.php';
    }

    // public function edit(int $id)
    // {
    //     $account = Json::getDB()->getBox($id);
    //     $pageTitle = 'Edit Bananna Box NR: ' . $account->id;
    //     require DIR . 'views/edit.php';
    // }

    public function add()
    {
        $accounts = Json::getDB()->readData();
        $id = (int) ($_POST['add'] ?? 0);
        $account = Json::getDB()->getBox($id);
        // $pageTitle = 'Edit Bananna Box NR: ' . $account->id;
        require DIR . 'views/edit.php';
    }

    public function update(int $id)
    {
        $account = Json::getDB()->getBox($id);
        $account->amount += (int) ($_POST['addEur'] ?? 0);
        Json::getDB()->update($account); // updeitina
        header('Location: ' . URL . 'list');
        die;
    }

    public function delete(int $id)
    {
        Json::getDB()->delete($id);
        header('Location: ' . URL . 'list');
        die;
    }
}
