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
                <input type="hidden" name="count" value="0">
                <input type="hidden" name="accountNumber" value="<?php 
                function accountGenerator()
                {
                    $string1 = '';
                    for ($i = 0; $i < 2; $i++) {
                        $string1 .= rand(0, 9);
                    }
                    $string2 = '';
                    for ($i = 0; $i < 3; $i++) {
                        $string2 .= rand(0, 9);
                    }
                    $string3 = '';
                    for ($i = 0; $i < 4; $i++) {
                        $string3 .= rand(0, 9);
                    }
                    $string4 = '';
                    for ($i = 0; $i < 4; $i++) {
                        $string4 .= rand(0, 9);
                    }
                    return 'LT' . $string1 . ' ' . '7044 0' . $string2 . ' ' . $string3 . ' ' . $string4;
                }
                echo accountGenerator();
                ?>">
                    Vardas: <input type="text" name="name" value="">
                    Pavardė: <input type="text" name="surname" value="">
                    Asmens kodas: <input type="text" name="personalID" id="">
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