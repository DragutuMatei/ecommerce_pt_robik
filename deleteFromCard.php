<?php
require_once './core/init.php';

if (isset($_POST['delete'])) {
    $user = new User();
    $id = Input::get('id');

    if ($user->isLoggedIn()) {
        if (Cos::DeleteProdus($id)) {
            Redirect::to('cos.php');
        } else {
            echo "meci mai prst :))), idk ce are";
        }
    }
}

if (isset($_POST['deleteAll'])) {
    $user = new User();

    if ($user->isLoggedIn()) {
        Cos::DeleteAll();
        Redirect::to('cos.php');
    }
}
