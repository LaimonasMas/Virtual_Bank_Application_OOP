<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: http://localhost/nd/nd_8oop/add');
    die;
}

?>

<?php require DIR . 'views/top.php' ?>
<?php require DIR . 'views/menu.php' ?>
<?php _d($_POST); ?>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <thead class="table-light">
        <tr>
            <br>
            <th scope="col">
                <p>#</p>
            </th>
            <th scope="col">
                <p>ID</p>
            </th>
            <th scope="col">
                <p>Vardas</p>
            </th>
            <th scope="col">
                <p>Pavardė</p>
            </th>
            <th scope="col">
                <p>Asmens kodas</p>
            </th>
            <th scope="col">
                <p>Sąskaitos numeris</p>
            </th>
            <th scope="col">
                <p>Sąskaitos likutis</p>
            </th>
            <th scope="col">
                <p>Veiksmai</p>
            </th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($accounts as $key => $account) : ?>
            <tr>
                <th scope="row"><?= ($key + 1) ?></th>
                <td><?= $account->id ?></td>
                <td><?= $account->name ?></td>
                <td><?= $account->surname ?></td>
                <td><?= $account->personalID ?></td>
                <td><?= $account->accountNumber ?></td>
                <td>€ <?= $account->amount ?></td>
                <td>
                    <form action="<?= URL ?>addMoney/<?= $account->id ?>" method="post">
                        Pridėti: <input type="text" name="addEur" value="">
                        <button type="submit" class="btn btn-outline-success btn-sm">Pridėti lėšas</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>

        </td>
        </tr>

    </tbody>
</table>

<?php require DIR . 'views/bottom.php' ?>