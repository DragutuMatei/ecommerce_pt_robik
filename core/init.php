<?php
session_start();

// session_unset();
// session_set_cookie_params(3600 * 24);

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["hostR"];
$cleardb_username = $cleardb_url["userR"];
$cleardb_password = $cleardb_url["passR"];
$cleardb_db = substr($cleardb_url["path"],1);

$GLOBALS['config'] = array(
    "mysql" => array(
        'host' => $cleardb_server,
        'username' => $cleardb_username,
        'password' => $cleardb_password,
        'db' => $cleardb_db
        // 'host' => 'eu-cdbr-west-01.cleardb.com',
        // 'username' => 'bd168ab4a8dffd',
        // 'password' => 'cd99342f',
        // 'db' => 'heroku_2afb099aaeb61b6'

    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expire' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
);

spl_autoload_register(function ($class) {
    require_once './classes/' . $class . '.php';
});

require_once './functions/sanitize.php';
