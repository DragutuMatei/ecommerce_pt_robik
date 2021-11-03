<?php
session_start();
// punktuletz
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
/**CREATE TABLE comenzi(
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ids VARCHAR(256) NOT NULL,
    qt VARCHAR(256) NOT NULL,
    note TEXT NOT NULL,
	confirm VARCHAR(256) NOT NULL,
    user VARCHAR(256) NOT NULL
); */
// mysql://b9fd0ddad69d53:1615acec@us-cdbr-east-04.cleardb.com/heroku_b94ff6c8117082d?reconnect=true
$GLOBALS['config'] = array(
    "mysql" => array(
        'host' => $cleardb_server,
        'username' => $cleardb_username,
        'password' => $cleardb_password,
        'db' => 'heroku_5d8849a648cd0f8'
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
