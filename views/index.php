<?php require DIR.'views/top.php' ?>
<h1><?= $pageTitle ?></h1>
<?php require DIR.'views/menu.php' ?>
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
    <?php foreach($boxes as $box) : ?>
    <li style="padding: 10px;">
        <span>ID: <?= $box->id ?></span>
        <span>Count: <?= $box->bannana ?></span>
        <a class="btn btn-outline-success" href="<?= URL ?>edit/<?= $box->id ?>">EDIT</a>
        <form style="display:inline-block;" action="<?= URL ?>delete/<?= $box->id ?>" method="post">
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
