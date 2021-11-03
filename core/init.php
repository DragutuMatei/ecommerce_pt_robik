<?php
session_start();
// punktuletz
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);

// mysql://b9fd0ddad69d53:1615acec@us-cdbr-east-04.cleardb.com/heroku_b94ff6c8117082d?reconnect=true
$GLOBALS['config'] = array(
    "mysql" => array(
        'host' => $cleardb_server,
        'username' => $cleardb_username,
        'password' => $cleardb_password,
        'db' => 'heroku_ffa7e0b75465646'

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
