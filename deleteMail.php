<?php
require_once './core/init.php';

if (Input::exists()) {
    $mail = new Mail();

    try {
        $mail->deleteEmail(Input::get("id"));
        Redirect::to("admin.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
