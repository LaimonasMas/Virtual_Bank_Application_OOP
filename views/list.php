<?php require DIR . 'views/top.php' ?>
<div style="height: 400px; background-image: url('<?= URL ?>img/1593762393592(2).jpg')" class="topnav">
  <img style="width:100px; float:left; margin-left:30px" src="<?= URL ?>img/logo.jpg" alt="">
  <a href="<?= URL ?>">Pradžia</a>
  <a href="<?= URL ?>create">Sukurti naują sąskaitą</a>
  <a class="active" href="<?= URL ?>list">Sąskaitų sąrašas</a>
  <a class="logout" name="logout" href="<?= URL ?>login">Atsijungti</a>
</div>
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
                    <form style="display:inline-block;" action="<?= URL ?>add" method="post">
                        <button type="submit" class="btn btn-outline-success btn-sm" name="add" value="<?= $account->id ?>">Pridėti lėšas</button>
                    </form>
                    <form style="display:inline-block;" action="<?= URL ?>withdraw" method="post">
                        <button type="submit" class="btn btn-outline-primary btn-sm" name="withdraw" value="<?= $account->id ?>">Nuskaityti lėšas</button>
                    </form>
                    <form style="display:inline-block;" action="<?= URL ?>delete/<?= $account->id ?>" method="post">
                        <button type="submit" class="btn btn-outline-danger btn-sm">Ištrinti sąskaitą</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>

        </td>
        </tr>

    </tbody>
</table>

<?php require DIR . 'views/bottom.php' ?>