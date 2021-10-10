<?php
require_once './core/init.php';
echo "sadasd";

if (isset($_POST['add'])) {
    $user = new User();

    $item = Input::get('item');

    echo $item."<br>";


    if ($user->isLoggedIn()) {
        if (Cos::AddProduse($item)) {
            // Redirect::to('figurine.php');
        } else {
            echo "meci mai prst :))), idk ce are";
        }
    
        echo $_SESSION['produse'][$_SESSION['user']][$item];

    }
} else {
    echo "asd";
}
