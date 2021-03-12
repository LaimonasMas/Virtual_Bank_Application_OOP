<?php require DIR . 'views/top.php' ?>
<h1><?= $pageTitle ?></h1>
<?php require DIR . 'views/menu.php' ?>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <thead class="table-light">
        <tr>
            <th scope="col">Sukurti naują sąskaitą</th>
            <th scope="col">Suteiktas sąskaitos numeris</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <form action="<?= URL ?>store" method="post">
                    Bannanas in box: <input type="text" name="count">
                    <button class="btn btn-outline-success btn-sm" type="submit">Create</button>
                </form>
                </td>
                <td>
                <p>LT35138516318438438</p>
                </td>
            </tr>
        </tbody>
    </table>
                <?php require DIR . 'views/bottom.php' ?>