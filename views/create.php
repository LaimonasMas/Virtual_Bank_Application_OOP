<?php require DIR . 'views/top.php' ?>
<?php require DIR . 'views/menu.php' ?>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <thead class="table-light">
        <tr>
            <th scope="col">Sukurti naują sąskaitą</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <form action="<?= URL ?>store" method="post">
                <input type="hidden" name="count" value="0">
                <input type="hidden" name="accountNumber" value="<?php echo Json::accountGenerator() ?>">
                    Vardas: <input type="text" name="name" value="">
                    Pavardė: <input type="text" name="surname" value="">
                    Asmens kodas: <input type="text" name="personalID" id="">
                    <button class="btn btn-outline-success btn-sm" type="submit">Create</button>
                </form>
                </td>
            </tr>
        </tbody>
    </table>
                <?php require DIR . 'views/bottom.php' ?>