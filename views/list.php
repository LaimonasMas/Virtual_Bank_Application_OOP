<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<h4><?= $pageTitle ?></h4>
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
                    <p>Sąskaitos numeris</p>
                </th>
                <th scope="col">
                    <p>Asmens kodas</p>
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
        <tr>
                <td>

           
<ul id="list">
    <?php foreach($accounts as $account) : ?>
    <li style="padding: 10px;">
        <span>ID: <?= $account->id ?></span>
        <span>Vardas: <?= $account->name ?></span>
        <span>Pavardė: <?= $account->surname ?></span>
        <span>Pavardė: <?= $account->personalID ?></span>
        <span>Pavardė: <?= $account->accountNumber ?></span>

        <a class="btn btn-outline-success" href="<?= URL ?>edit/<?= $account->id ?>">EDIT</a>
        <form style="display:inline-block;" action="<?= URL ?>delete/<?= $account->id ?>" method="post">
            <button type="submit" class="btn btn-outline-danger">DELETE</button>
        </form>
    </li>
    <?php endforeach ?>
</ul>
</td>
</tr>
                
</tbody>
</table>

<?php require DIR.'views/bottom.php' ?>