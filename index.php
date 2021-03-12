<?php
require __DIR__.'/bootstrap.php';

$uri = explode('/',str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']));

_d($uri);


// ROUTING

if ('' == $uri[0]) {
    (new AccountController)->index();
}
elseif ('create' == $uri[0]) {
    (new AccountController)->create();
}
elseif ('store' == $uri[0]) {
    (new AccountController)->store();
}
elseif ('edit' == $uri[0]) {
    (new AccountController)->edit((int)$uri[1]);
}
elseif ('update' == $uri[0]) {
    (new AccountController)->update((int)$uri[1]);
}
elseif ('delete' == $uri[0]) {
    (new AccountController)->delete((int)$uri[1]);
}
_d($_SESSION);

echo 'DURYS';
