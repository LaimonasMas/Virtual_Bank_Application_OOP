<?php
require __DIR__.'/bootstrap.php';

$uri = explode('/',str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']));

_d($uri);


// ROUTING
if ('login' == $uri[0]) {
    (new AccountController)->login();
}
if ('' == $uri[0]) {
    (new AccountController)->index();
}
elseif ('create' == $uri[0]) {
    (new AccountController)->create();
}
elseif ('created' == $uri[0]) {
    (new AccountController)->created();
}
elseif ('store' == $uri[0]) {
    (new AccountController)->store();
}
elseif ('list' == $uri[0]) {
    (new AccountController)->list();
}
elseif ('add' == $uri[0]) {
    (new AccountController)->add();
}
elseif ('addMoney' == $uri[0]) {
    (new AccountController)->addMoney((int)$uri[1]);
}
elseif ('withdraw' == $uri[0]) {
    (new AccountController)->withdraw();
}
elseif ('withdrawMoney' == $uri[0]) {
    (new AccountController)->withdrawMoney((int)$uri[1]);
}
elseif ('delete' == $uri[0]) {
    (new AccountController)->delete((int)$uri[1]);
}
_d($_SESSION);
