<?php
require DIR . 'views/top.php' ?>

<div style="height: 400px; background-image: url('<?= URL ?>img/1593762393592(2).jpg')" class="topnav">
  <img style="width:100px; float:left; margin-left:30px" src="<?= URL ?>img/logo.jpg" alt="">
  <a class="active login" name="login" href="<?= URL ?>login">Prisijungti</a>
</div>
<table class="table table-bordered table-hover" style="background:#F3F3F3">
    <thead class="table-light">
        <tr>
            <th scope="col">Įrašykite prisijungimo vardą ir slaptažodį</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <form action="<?= URL ?>" method="post">
                    <label style="display:inline-block; margin-left: 15px" for="">Vartotojo vardas: </label>
                    <input style="display:inline-block; margin:10px 30px 10px 5px" type="text" name="loginName">
                    <label style="display:inline-block; margin-left: 15px" for="">Spaltažodis: </label>
                    <input style="display:inline-block; margin:10px 30px 10px 5px" type="text" name="loginPass">
                    <button class="btn btn-outline-success btn-sm" type="submit" name="loginButton" value="1">Prisijungti</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<?php require DIR . 'views/bottom.php' ?>