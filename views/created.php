<?php require DIR . 'views/top.php';

// use App\Json;

?>
<div style="height: 400px; background-image: url('<?= URL ?>img/1593762393592(2).jpg')" class="topnav">
    <img style="width:100px; float:left; margin-left:30px" src="<?= URL ?>img/logo.jpg" alt="">
    <a href="<?= URL ?>">Pradžia</a>
    <a class="active" href="<?= URL ?>create">Sukurti naują sąskaitą</a>
    <a href="<?= URL ?>list">Sąskaitų sąrašas</a>
    <a class="logout" name="logout" href="<?= URL ?>login">Atsijungti</a>
</div>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <thead class="table-light">
        <tr>
            <th scope="col">Sveikiname sukūrus naują sąskaitą!</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><?= App\Account::accountReadOnly() ?></p>
            </td>
        </tr>
    </tbody>
</table>
<?php require DIR . 'views/bottom.php' ?>