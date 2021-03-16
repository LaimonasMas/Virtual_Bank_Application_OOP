<?php
require __DIR__.'/bootstrap.php';
include 'vendor\autoload.php';

$uri = explode('/',str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']));

_d($uri);


// ROUTING
if ('login' == $uri[0]) {
    (new App\AccountController)->login();
}
if ('' == $uri[0]) {
    (new App\AccountController)->index();
}
elseif ('create' == $uri[0]) {
    (new App\AccountController)->create();
}
elseif ('created' == $uri[0]) {
    (new App\AccountController)->created();
}
elseif ('store' == $uri[0]) {
    (new App\AccountController)->store();
}
elseif ('list' == $uri[0]) {
    (new App\AccountController)->list();
}
elseif ('add' == $uri[0]) {
    (new App\AccountController)->add((int)$uri[1]);
}
elseif ('add' == $uri[0]) {
    (new App\AccountController)->add((int)$uri[1]);
}
elseif ('addMoney' == $uri[0]) {
    (new App\AccountController)->addMoney((int)$uri[1]);
}
elseif ('withdraw' == $uri[0]) {
    (new App\AccountController)->withdraw((int)$uri[1]);
}
elseif ('withdrawMoney' == $uri[0]) {
    (new App\AccountController)->withdrawMoney((int)$uri[1]);
}
elseif ('delete' == $uri[0]) {
    (new App\AccountController)->delete((int)$uri[1]);
}
_d($_SESSION);
