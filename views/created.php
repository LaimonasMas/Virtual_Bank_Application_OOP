<?php require DIR . 'views/top.php' ?>
<?php require DIR . 'views/menu.php' ?>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <thead class="table-light">
        <tr>
            <th scope="col">Sveikiname sukūrus naują sąskaitą!</th>
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