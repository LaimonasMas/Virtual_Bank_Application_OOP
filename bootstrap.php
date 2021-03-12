<?php
session_start();
define('URL', 'http://localhost/nd/nd_8oop/'); // <--- konstanta
define('INSTALL_DIR', '/nd/nd_8oop/');
define('DIR', __DIR__.'/');



require DIR. 'app/AccountController.php';
require DIR. 'app/Json.php';
require DIR. 'app/Account.php';


// _d($_SESSION, 'SESIJA--->');

