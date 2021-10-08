<?php
require_once './core/init.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $user = new User();
    if ($user->isLoggedIn()) {
        try {
            $user->deleteProdus(array("id", "=", $id));
            Redirect::to("admin.php");
        } catch (Exception $e) {
            echo $e->getMessage();
        }    
    }
}
