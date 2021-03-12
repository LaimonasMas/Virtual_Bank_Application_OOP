<?php

class AccountController {

    public function index()
    {
        $pageTitle = 'Laimono Bankas';
        $accounts = Json::getDB()->readData();
        require DIR.'views/index.php';
    }

    public function create()
    {
        $pageTitle = 'New Bananna Box';
        require DIR.'views/create.php';
    }

    public function store()
    {
        
        $account = new Account;
        $account->initAmount = (int) ($_POST['count'] ?? 0);
        $account->name = ($_POST['name'] ?? '');
        $account->surname = ($_POST['surname'] ?? '');
        $account->accountNumber = ($_POST['accountNumber'] ?? '');
        $account->personalID = ($_POST['personalID'] ?? '');
        Json::getDB()->store($account); // sukuria
        header('Location: '.URL.'create');
        die;
    }

    public function list()
    {
        $pageTitle = 'Sąskaitų sąrašas';
        $accounts = Json::getDB()->readData();
        require DIR.'views/list.php';
    }

    public function edit(int $id)
    {
        $account = Json::getDB()->getBox($id);
        $pageTitle = 'Edit Bananna Box NR: '.$account->id;
        require DIR.'views/edit.php';
    }

    public function update(int $id)
    {
        $account = Json::getDB()->getBox($id);
        $account->initAmount = (int) ($_POST['count'] ?? 0);
        Json::getDB()->update($account); // updeitina
        header('Location: '.URL);
        die;
    }

    public function delete(int $id)
    {
        Json::getDB()->delete($id);
        header('Location: '.URL.'list');
        die;
    }


}
