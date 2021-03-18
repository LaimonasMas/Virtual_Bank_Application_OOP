<?php
require DIR . 'views/top.php';
_d($_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_destroy();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginName']) && isset($_POST['loginPass'])) {
    if (!file_exists(DIR . 'data/users.json')) {
        include DIR . 'users/migration.php';
    }
    $users = file_get_contents(DIR . 'data/users.json');
    $users = json_decode($users, 1);

    $postName = $_POST['loginName'] ?? '';
    $postPass = $_POST['loginPass'] ?? '';

    foreach ($users as $user) {
        if ($postName == $user['name']) { // <--- turim useri
            if (password_verify($postPass, $user['pass'])) { // <--- viskas OK
                // sugalvojam kad 1 reiks prisijungusi vartotoja
                //  o 0 reiks neprisijungusi
                $_SESSION['login'] = 1;
                $_SESSION['user'] = $user;
                header('Location: http://localhost/nd/nd_8oop');
                die;
            }
        }
    }
    // $_SESSION['error_msg'] = 'Password or Name is invalid.';
    // header('Location: http://localhost/nd/nd_8/login/login.php');
    // die;
}
?>


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
                <form action="<?= URL ?>views/login" method="post">
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