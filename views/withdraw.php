<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: http://localhost/nd/nd_8oop/withdraw');
    die;
}

?>

<?php require DIR . 'views/top.php' ?>
<?php require DIR . 'views/menu.php' ?>
<?php _d($_POST); ?>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <?php require DIR . 'views/tableHead.php' ?>
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
                    <form action="<?= URL ?>withdrawMoney/<?= $account->id ?>" method="post">
                        Nuskaityti: <input type="text" name="withdrawEur" value="">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Nuskaityti lėšas</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>

        </td>
        </tr>

    </tbody>
</table>

<?php require DIR . 'views/bottom.php' ?>