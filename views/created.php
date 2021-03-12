<?php require DIR . 'views/top.php' ?>
<h1><?= $pageTitle ?></h1>
<?php require DIR . 'views/menu.php' ?>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <thead class="table-light">
        <tr>
            <th scope="col">Suteiktas sąskaitos numeris</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><?= Json::accountReadOnly() ?></p>
            </td>
        </tr>
    </tbody>
</table>
<?php require DIR . 'views/bottom.php' ?>