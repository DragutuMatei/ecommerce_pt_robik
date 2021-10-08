<?php
session_start();

// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"], 1);

mysql://b193caa9e04491:55d7b7bc@eu-cdbr-west-01.cleardb.com/heroku_ffa7e0b75465646?reconnect=true
$GLOBALS['config'] = array(
    "mysql" => array(
        // 'host' => $cleardb_server,
        // 'username' => $cleardb_username,
        // 'password' => $cleardb_password,
        // 'db' => $cleardb_db
        'host' => 'eu-cdbr-west-01.cleardb.com',
        'username' => 'b193caa9e04491',
        'password' => '55d7b7bc',
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
