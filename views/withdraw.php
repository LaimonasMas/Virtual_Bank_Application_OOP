<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: http://localhost/nd/nd_8oop/withdraw/$account->id");
    die;
}

?>

<?php require DIR . 'views/top.php' ?>
<div style="height: 400px; background-image: url('<?= URL ?>img/1593762393592(2).jpg')" class="topnav">
    <img style="width:100px; float:left; margin-left:30px" src="<?= URL ?>img/logo.jpg" alt="">
    <a href="<?= URL ?>">Pradžia</a>
    <a href="<?= URL ?>create">Sukurti naują sąskaitą</a>
    <a class="active" href="<?= URL ?>list">Sąskaitų sąrašas</a>
    <a class="logout" name="logout" href="<?= URL ?>login">Atsijungti</a>
</div>
<?php _d($_POST); ?>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <?php require DIR . 'views/tableHead.php' ?>
    <tbody>
        <tr>
            <th scope="row"></th>
            <?php require DIR . 'views/tableMainRow.php' ?>
            <td>
                <form action="<?= URL ?>withdrawMoney/<?= $account->id ?>" method="post">
                    Nuskaityti: <input type="text" name="withdrawEur" value="">
                    <button type="submit" class="btn btn-outline-primary btn-sm">Nuskaityti lėšas</button>
                </form>
            </td>
        </tr>
        </td>
        </tr>
    </tbody>
</table>

<?php require DIR . 'views/bottom.php' ?>