<?php
use App\AccountController as A;
require __DIR__.'/bootstrap.php';
include 'vendor\autoload.php';

$uri = explode('/',str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']));

_d($uri);


// ROUTING
if ('login' == $uri[0]) {
    (new A)->login();
}
if ('' == $uri[0]) {
    (new A)->index();
}
elseif ('create' == $uri[0]) {
    (new A)->create();
}
elseif ('created' == $uri[0]) {
    (new A)->created();
}
elseif ('store' == $uri[0]) {
    (new A)->store();
}
elseif ('list' == $uri[0]) {
    (new A)->list();
}
elseif ('add' == $uri[0]) {
    (new A)->add((int)$uri[1]);
}
elseif ('add' == $uri[0]) {
    (new A)->add((int)$uri[1]);
}
elseif ('addMoney' == $uri[0]) {
    (new A)->addMoney((int)$uri[1]);
}
elseif ('withdraw' == $uri[0]) {
    (new A)->withdraw((int)$uri[1]);
}
elseif ('withdrawMoney' == $uri[0]) {
    (new A)->withdrawMoney((int)$uri[1]);
}
elseif ('delete' == $uri[0]) {
    (new A)->delete((int)$uri[1]);
}
_d($_SESSION);
