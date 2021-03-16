<?php require DIR . 'views/top.php'; 

use App\Json;

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