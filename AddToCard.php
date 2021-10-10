<?php
require_once './core/init.php';
echo "sadasd";

if (isset($_POST['add'])) {
    $user = new User();

    $item = Input::get('item');

    echo $item;

    if ($user->isLoggedIn()) {
        if (Cos::AddProduse($item)) {
            Redirect::to('figurine.php');
        } else {
            echo "meci mai prst :))), idk ce are";
        }
    }
} else {
    echo "asd";
}
