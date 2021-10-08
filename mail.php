<?php
require_once './core/init.php';

if (isset($_POST["mail"])) {

    $mail = new Mail();
    try {
        $mail->sendEmail(array(
            "nume" => Input::get("nume") . " " . Input::get("prenume"),
            "email" => Input::get("email"),
            "tel" => Input::get("tel"),
            "text" => Input::get("text"),
        ));

        Redirect::to("index.php");
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
